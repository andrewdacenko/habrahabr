<?php

class Role extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'role' => 'required|alpha|min:2|max:200|unique:roles,role'
	);
}
