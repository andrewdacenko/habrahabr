<?php

class Company extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required|alpha|min:2|max:200|unique:companies,name'
	);

	public function offers()
	{
		return $this->hasMany('Offer');
	}
}
