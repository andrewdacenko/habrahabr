@extends('layouts.scaffold')

@section('main')

<h1>All Cities</h1>

<p>{{ link_to_route('cities.create', 'Add new city') }}</p>

@if ($cities->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($cities as $city)
				<tr>
					<td>{{{ $city->name }}}</td>
                    <td>{{ link_to_route('cities.edit', 'Edit', array($city->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('cities.destroy', $city->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no cities
@endif

@stop
