{{ Form::label('title', 'Title:') }}
{{ Form::text('title') }}

{{ Form::label('location', 'Location:') }}
{{ Form::text('location') }}

{{ Form::label('date', 'Date:') }}
{{ Form::text('date') }}

{{ Form::label('cutoff_time', 'Cutoff Time:') }}
{{ Form::text('cutoff_time') }}

{{ Form::label('min_to_play', 'Minimum to Play:') }}
{{ Form::text('min_to_play') }}

{{ Form::label('max_per_team', 'Max Players per Team:') }}
{{ Form::text('max_per_team') }}

{{ Form::submit($submit_text, array('class' => 'button tiny')) }}
