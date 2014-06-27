@extends('layout')

@section('content')
	<h2>{{ $game->title }}</h2>
	<p>{{ $game->location }} - {{ date("D, F j, Y @ g:ia",strtotime($game->date)) }}</p>
	<p class="<?php echo Attendee::happeningClass($game); ?>">Need {{ $game->min_to_play }} to play (have <?php echo Attendee::countAttendees($game); ?>) - It's <?php echo Attendee::happeningAnnounce($game); ?></p>
	<?php // echo Game::whereId($game->id)->attendees->count(); ?>
	<a href="{{ route('games.attendees.create', $game->id) }}" class="button tiny ">I'm Comin'!</a>
	<hr>
  @if (!$game->attendees->count() )
  	<div class="row">
  		<div class="medium-2 small-3 columns">
  			<h2>Your game has no game!</h2>
  		</div>
  	</div>
	  
	@else
		<h3>Here's who's comin'!</h3>
	  @foreach($game->attendees as $attendee)
			<div class="row">
				<div class="medium-1 small-2 columns">
					{{ Form::open(array('class' => 'inline', 'method' => 'DELETE', 'route' => array('games.attendees.destroy', $game->id, $attendee->id))) }}
 
							{{ Form::submit('Delete', array('class' => 'button alert tiny')) }}
						{{ Form::close() }}
				</div>
				<div class="medium-11 small-10 columns">
					<p>{{ $attendee->name }}	</p>
				</div>
			</div>
			

		@endforeach
		
	@endif
@stop