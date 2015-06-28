@extends('layouts.single')

@section('head.title')

    Contact {{ config('store.name') }}

@stop

@section('main')

    <h5>Contact {{ config('store.name') }}</h5>

    <p>Have a question? Send us some information, we can help.</p>

    @form('contact')

@stop