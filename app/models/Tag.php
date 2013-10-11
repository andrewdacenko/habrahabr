<?php

class Tag extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required|min:2|max:200|unique:tags,name'
	);

	public function offers()
	{
		return $this->belongsToMany('Offer');
	}
}
