<?php

class Offer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required|between:5,200',
		'description' => 'required|min:10',
		'city_id' => 'required|exists:cities,id',
		'company_id' => 'required|exists:companies,id',
		'off' => 'required|numeric|min:1|max:100',
		'image' => 'required|regex:/\/images\/\d{4}\/\d{2}\/\d{2}\/([A-z0-9]){30}\.jpg/', 
		// matches /images/2012/12/21/ThisIsTheEndOfTheWorldMaya2112.jpg
		'expires' => 'required|date',
		'tags' => 'required'
	);

	public function city()
	{
		return $this->belongsTo('City');
	}

	public function company()
	{
		return $this->belongsTo('Company');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
	}

	public function usersComments()
	{
		return $this->belongsToMany('User', 'comments')->withPivot('body', 'mark')->withTimestamps();
	}

	public function webDescription($options = array())
	{
		$str = $this->description;

		if (isset($options['shorten'])) {
			$length = isset($options['length']) ? (int) $options['length'] : 250;
			$end = isset($options['end']) ? : '&#8230;';
			if (mb_strlen($str) > $length) {
				$str = mb_substr(trim($str), 0, $length);
				$str = mb_substr($str, 0, mb_strlen($str) - mb_strpos(strrev($str), ' '));
				$str = trim($str.$end);
			}
		}
		
		$str = str_replace("\r\n", '<br>', e($str));
		return $str;
	}
	
	public function scopeActive($query)
	{
		return $query->where('expires', '>', DB::raw('NOW()'));
	}

	public function scopeSortLatest($query, $desc = true)
	{
		$order = $desc ? 'desc' : 'asc';
		return $query->orderBy('created_at', $order);
	}

}
