<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
		@yield('styles')
	</head>

	<body>

		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="{{ route('home') }}">Habr Offers</a>
					<ul class="nav">
						<li><a href="{{ route('home') }}">Home</a></li>
					</ul>
					<div class="btn-group pull-right">
						@if(Auth::guest())
							<a href="{{ route('login.index') }}" class="btn">Login</a>
							<a href="{{ route('login.register') }}" class="btn">Register</a>
						@else
							<a href="{{ route('home.bookmarks') }}" class="btn">My Bookmarks</a>
							<a href="{{ route('login.logout') }}" class="btn">Logout</a>
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="container">

			@if (Session::has('message'))
				<div class="flash alert">
					{{ Session::get('message') }}
				</div>
			@endif
			
			<div class="row-fluid">
				<div class="span3">
					<h2>Last Comments</h2>
				
					@if (count($comments = Comment::take(5)->get()) > 0)
						@foreach ($comments as $comment)
							@include('partials.comment', $comment)
						@endforeach
					@else
						There are no comments yet
					@endif
				</div>
	
				<div class="span9">
					@yield('main')
				</div>
			</div>
		</div>

		<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
		@yield('scripts')

	</body>

</html>