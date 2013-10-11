@extends('layouts.main')

@section('main')

		
<h1>{{ $title }}</h1>

@if ($offers->count())
	{{ $offers->links() }}
	@foreach ($offers as $key => $offer)
		@if($key % 3 == 0)
			<div class="row-fluid">
				<ul class="thumbnails">
		@endif

		<li class="span4">
			<div class="thumbnail">
				@include('offers._preview', $offer)
			</div>
		</li>
			
		@if($key % 3 == 2 || $key == count($offers) - 1)
				</ul>
			</div>
		@endif
	@endforeach

	{{ $offers->links() }}
@else
	There are no offers
@endif

@stop
