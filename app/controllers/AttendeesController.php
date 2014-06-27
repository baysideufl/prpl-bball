<?php

class AttendeesController extends \BaseController {

	/**
	 * Display a listing of attendees
	 *
	 * @return Response
	 */
	public function index($game)
	{
		$attendees = Attendee::all();

		return View::make('attendees.index', compact('game'));
	}

	/**
	 * Show the form for creating a new attendee
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$game = Game::find($id);

		return View::make('attendees.create', compact('game'));
	}

	/**
	 * Store a newly created attendee in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$validator = Validator::make($data = Input::all(), Attendee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Attendee::create($data);

		$game = Game::find($id);
		$message = "Attendee Added!";
		if( Attendee::isHappening($game) ){
			$message .= "<br>" . Attendee::sendNotifications($game);
		}

		return Redirect::route('games.show', $game->id)->with('message', $message);
	}

	/**
	 * Display the specified attendee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($game, $attendee)
	{
		$attendee = Attendee::findOrFail($attendee);

		return View::make('attendees.show', compact('game','attendee'));
	}

	/**
	 * Show the form for editing the specified attendee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($game, $attendee)
	{
		$attendee = Attendee::find($attendee);

		return View::make('attendees.edit', compact('game','attendee'));
	}

	/**
	 * Update the specified attendee in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($game, $attendee)
	{
		$attendee = Attendee::findOrFail($attendee);

		$validator = Validator::make($data = Input::all(), Attendee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$attendee->update($data);

		return Redirect::route('games.show')->with('message', 'Attendee Updated!');
	}

	/**
	 * Remove the specified attendee from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($game, $attendee)
	{
		Attendee::destroy($attendee);

		return Redirect::route('games.show', $game);
	}





}
