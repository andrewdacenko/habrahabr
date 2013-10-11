@extends('layouts.scaffold')

@section('main')

<h1>Show City</h1>

<p>{{ link_to_route('cities.index', 'Return to all cities') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $city->name }}}</td>
                    <td>{{ link_to_route('cities.edit', 'Edit', array($city->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('cities.destroy', $city->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
