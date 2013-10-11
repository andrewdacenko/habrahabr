@extends('layouts.scaffold')

@section('main')

<h1>Show Role</h1>

<p>{{ link_to_route('roles.index', 'Return to all roles') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Role</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $role->role }}}</td>
                    <td>{{ link_to_route('roles.edit', 'Edit', array($role->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('roles.destroy', $role->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
