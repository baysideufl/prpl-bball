<?php

class AttendeesController extends \BaseController {

	/**
	 * Display a listing of attendees
	 *
	 * @return Response
	 */
	public function index()
	{
		$attendees = Attendee::all();

		return View::make('attendees.index', compact('attendees'));
	}

	/**
	 * Show the form for creating a new attendee
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('attendees.create');
	}

	/**
	 * Store a newly created attendee in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Attendee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Attendee::create($data);

		return Redirect::route('attendees.index');
	}

	/**
	 * Display the specified attendee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$attendee = Attendee::findOrFail($id);

		return View::make('attendees.show', compact('attendee'));
	}

	/**
	 * Show the form for editing the specified attendee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$attendee = Attendee::find($id);

		return View::make('attendees.edit', compact('attendee'));
	}

	/**
	 * Update the specified attendee in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$attendee = Attendee::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Attendee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$attendee->update($data);

		return Redirect::route('attendees.index');
	}

	/**
	 * Remove the specified attendee from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Attendee::destroy($id);

		return Redirect::route('attendees.index');
	}

}
