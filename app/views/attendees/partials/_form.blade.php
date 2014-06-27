{{ Form::label('name', 'Name:') }}
{{ Form::text('name') }}

{{ Form::label('email', 'Email:') }}
{{ Form::text('email') }}

{{ Form::label('phone', 'Phone Number:') }}
{{ Form::text('phone') }}

{{ Form::label('carrier', 'Carrier:') }}
{{ Form::select('carrier', array('att' => 'AT&T', 'sprint' => 'Sprint', 'verizon' => 'Verizon', 'tmobile' => 'T-Mobile', 'tracfone' => 'Tracfone', 'uscellular' => 'U.S. Cellular'), 'att') }}

{{ Form::hidden('game_id', $game_id) }}


{{ Form::submit($submit_text, array('class' => 'button tiny')) }}
