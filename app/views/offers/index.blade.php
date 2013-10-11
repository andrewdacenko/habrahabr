@extends('layouts.scaffold')

@section('main')

<h1>All Offers</h1>

<p>{{ link_to_route('offers.create', 'Add new offer') }}</p>

@if ($offers->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>City</th>
				<th>Company</th>
				<th>Off</th>
				<th>Image</th>
				<th>Tags</th>
				<th>Expires</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($offers as $offer)
				<tr>
					<td>{{{ $offer->title }}}</td>
					<td>{{ $offer->webDescription(array('shorten' => true, 'length' => 60)) }}</td>
					<td>{{{ $offer->city->name }}}</td>
					<td>{{{ $offer->company->name }}}</td>
					<td>{{{ $offer->off }}}</td>
					<td><img src="{{{ $offer->image }}}" style="max-width: 200px; max-height:150px;"/></td>
					<td>
						@foreach($offer->tags as $tag)
							<span class="badge">{{{$tag->name}}}</span>
						@endforeach
					</td>
					<td>{{{ $offer->expires }}}</td>
					<td>{{ link_to_route('offers.edit', 'Edit', array($offer->id), array('class' => 'btn btn-info')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('offers.destroy', $offer->id))) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no offers
@endif

@stop
