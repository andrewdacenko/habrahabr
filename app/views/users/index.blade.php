@extends('layouts.scaffold')

@section('main')

<h1>All Users</h1>

@if ($users->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Roles</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{{ $user->username }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>
						@foreach($user->roles as $role)
							<span class="badge">{{{$role->role}}}</span>
						@endforeach
					</td>
					<td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no users
@endif

@stop
