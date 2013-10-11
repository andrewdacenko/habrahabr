@extends('layouts.scaffold')

@section('main')

<h1>Edit City</h1>
{{ Form::model($city, array('method' => 'PATCH', 'route' => array('cities.update', $city->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('cities.show', 'Cancel', $city->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
