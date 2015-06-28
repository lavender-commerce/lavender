@extends('layouts.leftcol')

@section('head.title')
Customer Dashboard
@stop

@section('sidebar')
    <h5>Account Options</h5>
    <ul>
        <li><a>link</a></li>
        <li><a>link</a></li>
        <li><a>link</a></li>
    </ul>
@stop

@section('content')
    Welcome, {{ $customer->email }}!
@stop