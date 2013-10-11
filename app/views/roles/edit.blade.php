@extends('layouts.scaffold')

@section('main')

<h1>Edit Role</h1>
{{ Form::model($role, array('method' => 'PATCH', 'route' => array('roles.update', $role->id))) }}
	<ul>
        <li>
            {{ Form::label('role', 'Role:') }}
            {{ Form::text('role') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('roles.show', 'Cancel', $role->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
