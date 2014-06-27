<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RSVP | Is it ON?!</title>
		<!-- CSS Files -->
{{ HTML::style('css/foundation.css') }}
{{ HTML::style('css/normalize.css')}}
{{ HTML::style('css/custom.css')}}

<!-- Javascript Files -->
<script src="{{ URL::asset('js/vendor/modernizr.js') }}"></script>
<script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
<script src="{{ URL::asset('js/foundation.min.js') }}"></script>
	</head>
  <body>
	@include('parts.nav')

    <div class="row" id="main-content">
    	<div class="large-12 small-12 columns">
    		@if (Session::has('message'))
					<div data-alert class="flash alert-box success">
						{{ Session::get('message') }}
					</div>
				@endif
				@if ($errors->any())
					<div class="alert-box warning">
						<ul>
							{{ implode('', $errors->all('<li class="error">:message</li>')) }}
						</ul>						
					</div>
				@endif


		    @yield('content')				
    	</div>
    </div>

  <script>
    $(document).foundation();
  </script>
	<?php	echo "Env: " . app('env'); ?>

  </body>
</html>