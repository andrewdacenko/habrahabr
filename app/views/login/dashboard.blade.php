@extends('layouts.scaffold')

@section('main')

<h1>Administrative Dashboard</h1>

<p>Nice to see you, <b>{{{ Auth::user()->username }}}</b></p>

@stop