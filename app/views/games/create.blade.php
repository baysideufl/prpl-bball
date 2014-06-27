@extends('layout')

@section('content')
	<h2>Create Game</h2>
	<hr>
	{{ Form::model(new Game, ['route' => ['games.store']]) }}
		@include('games/partials/_form', ['submit_text' => 'Create Game'])
	{{ Form::close() }}


@stop