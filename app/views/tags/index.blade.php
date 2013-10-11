@extends('layouts.scaffold')

@section('main')

<h1>All Tags</h1>

<p>{{ link_to_route('tags.create', 'Add new tag') }}</p>

@if ($tags->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tags as $tag)
				<tr>
					<td>{{{ $tag->name }}}</td>
                    <td>{{ link_to_route('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no tags
@endif

@stop
