<?php

class Comment extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'body' => 'required',
		'user_id' => 'required',
		'offer_id' => 'required',
		'mark' => 'required'
	);

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function offer()
	{
		return $this->belongsTo('Offer');
	}

	public function webBody($options = array())
	{
		$str = $this->body;

		if (isset($options['shorten'])) {
			$length = isset($options['length']) ? (int) $options['length'] : 50;
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
		
}
