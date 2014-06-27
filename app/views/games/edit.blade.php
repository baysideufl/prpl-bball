@extends('layout')

@section('content')
	<h2>Edit {{ $game->title }}</h2>
	<hr>
  	{{ Form::model($game, ['method' => 'PATCH', 'route' => ['games.update', $game->id]]) }}
		@include('games/partials/_form', ['submit_text' => 'Edit Game', 'game_id' => $game->id])
	{{ Form::close() }}

@stop