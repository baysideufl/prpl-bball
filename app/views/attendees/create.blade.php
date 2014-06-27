@extends('layout')

@section('content')
	<h2>Attendee RSVP</h2>
	<hr>
	{{ Form::model(new Attendee, ['route' => ['games.attendees.store', $game->id]]) }}
		@include('attendees/partials/_form', array('submit_text' => 'RSVP', 'game_id' => $game->id))
	{{ Form::close() }}


@stop