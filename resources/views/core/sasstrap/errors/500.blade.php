@extends('layouts.error')

@section('head.title')
	500 Error
@stop

@section('message')

    <div class="content">

        <div class="title">Oops!</div>

        <div class="description">{{ $message }}</div>

        @if($debug)

            <div class="trace"><code><pre>{{ $trace }}</pre></code></div>

        @endif

    </div>

@stop