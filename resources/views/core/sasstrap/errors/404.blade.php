@extends('layouts.error')

@section('head.title')
	Not found
@stop

@section('message')
	<div class="content">
		<div class="title">404</div>
		<div class="description">
            Oops! Page not found. <a href="{{ URL::previous() }}">Click here</a> to go back.
        </div>
	</div>
@stop