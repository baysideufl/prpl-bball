@extends('layout')

@section('content')
    @foreach($games as $game)
    	<p>{{ $game->title }} - {{ $game->date }}</p>
  	@endforeach
@stop