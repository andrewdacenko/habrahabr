@extends('layouts.scaffold')

@section('main')

<h1>Show Company</h1>

<p>{{ link_to_route('companies.index', 'Return to all companies') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $company->name }}}</td>
                    <td>{{ link_to_route('companies.edit', 'Edit', array($company->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('companies.destroy', $company->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
