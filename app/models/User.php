<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function usersOffers()
	{
		return $this->belongsToMany('Offer', 'comments')->withPivot('body', 'mark')->withTimestamps();
	}

	public function roles()
	{
		return $this->belongsToMany('Role');
	}

	public function isAdmin()
	{
		$admin_role = Role::whereRole('admin')->first();
		return $this->roles->contains($admin_role->id);
	}

	public function isManager()
	{
		$manager_role = Role::whereRole('manager')->first();
		return $this->roles->contains($manager_role->id) || $this->isAdmin();
	}

	public function isModerator()
	{
		$admin_role = Role::whereRole('admin')->first();
		return $this->roles->contains($admin_role->id) || $this->isAdmin();
	}

	public function isRegular()
	{
		$roles = array_filter($this->roles->toArray());
		return empty($roles);
	}
}