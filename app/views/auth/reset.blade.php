@extends('layouts.scaffold')

@section('main')

@if (Session::has('error'))
	<div class="alert alert-error">
    	{{ trans(Session::get('reason')) }}
	</div>
@endif

<h1>Reset your password</h1>

{{ Form::open() }}
{{ Form::hidden('token', $token) }}
	<ul>
		<li>
			{{ Form::label('email', 'Email')}}
			{{ Form::email('email', Input::old('email')) }}
		</li>

		<li>
			{{Form::label('password', 'New password')}}
			{{ Form::password('password')}}
		</li>

		<li>
			{{Form::label('password', 'New password confirmation')}}
			{{ Form::password('password_confirmation')}}
		</li>

	</ul>
{{ Form::submit('Reset', array('class' => 'btn'))}}
{{ Form::close() }}
@stop