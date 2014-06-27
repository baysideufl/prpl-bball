<?php

class Game extends \Eloquent {

	public function attendees()
	{
		return $this->hasMany('Attendee');
	}
	// Add your validation rules here
	public static $rules = [
		'title' => 'required',
		'date' => 'required',
		'min_to_play' => 'required|numeric'
	];

	// Don't forget to fill this array
	protected $guarded = [];

}