@extends('layouts.scaffold')

@section('main')

<h1>Create Role</h1>

{{ Form::open(array('route' => 'roles.store')) }}
	<ul>
        <li>
            {{ Form::label('role', 'Role:') }}
            {{ Form::text('role') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


