@extends('layouts.main')

@section('main')

<div class="page-header">
	<h1>
		<span class="label label-important label-big">{{{ $offer->off }}}%</span>
		{{{ $offer->title }}} 
		<small> by
			<a href="{{{ route('home.by_company', $offer->company->name) }}}">{{{ $offer->company->name }}}</a>
		</small>
	</h1>
</div>

<div class="pull-left image-container-big">
	<img class="img-rounded" src="{{{ $offer->image }}}" alt="{{{ $offer->title }}}">
</div>

<div class="description">
	<p>{{ $offer->webDescription() }}</p>
</div>

<div class="clearfix"></div>
<hr>
<p>Location: 
	<a href="{{ route('home.by_city', $offer->city->name) }}">{{{ $offer->city->name }}}</a>
</p>
<p>Tags: 
	@foreach($offer->tags as $tag)
		<a class="no_decoration" href="{{ route('home.by_tag', $tag->name) }}">
			<span class="badge">{{{$tag->name}}}</span>
		</a>
	@endforeach
</p>

<hr>

<div class="page-header">
	<h3>User's comments <small>leave and yours one</small></h3>
</div>

@if(!$offer->usersComments->count())
<div class="well">You can be first to comment on this offer!</div>
@endif

@if(Auth::guest() || (!Auth::guest() && !$offer->usersComments->contains(Auth::user()->id)))
{{ Form::open() }}
{{ Form::textarea('body', Input::old('body'), array('class' => 'input-block-level', 'style' => 'resize: vertical;'))}}
 <div class="input-append">
{{ Form::select('mark', array(5 => 5, 4 => 4, 3 => 3, 2 => 2, 1 => 1), Input::old('mark', 5)) }}
{{ Form::submit('Comment', array('class' => 'btn btn-success', 'style' => 'clear: both;')) }}
</div>
{{ Form::close() }}
@include('partials.errors', $errors)
@endif

@foreach($offer->usersComments as $user)
<div class="media">
	<a class="pull-left" href="#">
		<img class="media-object" data-src="holder.js/64x64">
	</a>
	<div class="media-body">
		<h4 class="media-heading">{{{ $user->username }}} <span class="label label-success">mark: {{{ $user->pivot->mark }}}</span></h4>
	<p class="muted">{{ str_replace("\r\n", '<br>', e($user->pivot->body)) }}</p>
	</div>
</div>
@endforeach
@stop