@extends('layouts.scaffold')

@section('main')

<h1>Edit Comment</h1>
{{ Form::model($comment, array('method' => 'PATCH', 'route' => array('comments.update', $comment->id))) }}
	<ul>
        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('offer_id', 'Offer_id:') }}
            {{ Form::input('number', 'offer_id') }}
        </li>

        <li>
            {{ Form::label('mark', 'Mark:') }}
            {{ Form::input('number', 'mark') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('comments.show', 'Cancel', $comment->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
