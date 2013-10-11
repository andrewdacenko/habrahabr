@extends('layouts.scaffold')

@section('main')

<h1>All Roles</h1>

<p>{{ link_to_route('roles.create', 'Add new role') }}</p>

@if ($roles->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Role</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($roles as $role)
				<tr>
					<td>{{{ $role->role }}}</td>
                    <td>{{ link_to_route('roles.edit', 'Edit', array($role->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('roles.destroy', $role->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no roles
@endif

@stop
