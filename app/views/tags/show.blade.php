@extends('layouts.scaffold')

@section('main')

<h1>Show Tag</h1>

<p>{{ link_to_route('tags.index', 'Return to all tags') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tag->name }}}</td>
                    <td>{{ link_to_route('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
