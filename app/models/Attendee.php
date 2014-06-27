<?php

class Attendee extends \Eloquent {

	public function game()
	{
		return $this->belongsTo('Game');
	}
	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
		'email'	=> 'required|email',
		'phone' => 'required|numeric',
		'carrier' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = [];

	public static function countAttendees($game)
	{
		return $game->attendees->count();

	}

	public static function happeningClass($game)
	{
		if($game->attendees->count() >= $game->min_to_play){
			return "happening";
		}
		return "not_happening";
	}

	public static function happeningAnnounce($game)
	{
		if($game->attendees->count() >= $game->min_to_play){
			return "happening";
		}
		return "not happening yet";
	}

	public static function isHappening($game)
	{
		if (($game->attendees->count()) >= $game->min_to_play){
			return true;
		} else {
			return false;
		}

	}


	public static function sendNotifications($game)
	{
		$pass = 0;
		$fail = 0;
		$subject = "Game On!";
		$message = "$game->title is happening... be there!";
		$headers = "from: baysidestuff@gmail.com";
		
		foreach($game->attendees as $attendee){
			$to = "$attendee->email," . Attendee::getCarrierAddress($attendee->phone, $attendee->carrier);
			$response = mail($to, $subject, $message, $headers);
			if ($response){
				$pass++;
			} else {
				$fail++;
			}
			$addresses .= $to . " ";
		}


		return "Messages Sent!";
	}

	public static function getCarrierAddress($phone, $carrier)
	{

		switch ($carrier) {
			case 'att':
					$address = $phone . "@txt.att.net";
				break;
			case 'sprint':
					$address = $phone . "@messaging.sprintpcs.com";
				break;
			case 'tmobile':
					$address = $phone . "@tmomail.net";
				break;
			case 'verizon':
					$address = $phone . "@vtext.com";
				break;
			case 'tracfone':
					$address = $phone . "@txt.att.net";
				break;
			case 'uscellular':
					$address = $phone . "@email.uscc.net";
				break;			
		}
			return $address;	
	}

}