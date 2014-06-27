@extends('layout')

@section('content')
  <h2>Are Ya Comin', Son?!</h1>  	
	<hr>
  @if (!$games->count() )
  	<div class="row">
  		<div class="medium-2 small-3 columns">
  			<h2>You got no game!</h2>
  		</div>
  	</div>
	  
	@else
	  @foreach($games as $game)
			<div class="row">
	    	<div class="medium-2 small-3 columns">
					<a href="{{ route('games.attendees.create', $game->id) }}" class="button tiny expand">I'm Comin'!</a>


	    	</div>
				<div class="medium-6 small-9 columns">				
		    	<a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a> -  <span class="<?php echo Attendee::happeningClass($game); ?>">It's <?php echo Attendee::happeningAnnounce($game); ?></span><br>
		    	{{ date("D, F j, Y @ g:ia",strtotime($game->date)) }}
				</div>
				<div class="medium-4 small-12 columns">
					
						{{ Form::open(array('class' => 'inline', 'method' => 'DELETE', 'route' => array('games.destroy', $game->id))) }}
							{{ link_to_route('games.edit', 'Edit', array($game->id), array('class' => 'button tiny')) }}
 
							{{ Form::submit('Delete', array('class' => 'button alert tiny')) }}
						{{ Form::close() }}
					
				</div>
			</div>
		@endforeach

	@endif

	<p>{{ link_to_route('games.create', 'Create Game') }}</p>

@stop