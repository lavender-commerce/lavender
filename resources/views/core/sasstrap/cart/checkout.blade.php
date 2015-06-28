@extends('layouts.default')

@section('head.title')
    Shipping
@stop

@section('main')

    <div class="row">

        <div class="four columns">

            @include('cart.partials.progress')

        </div>

        <div class="eight columns">

            @yield('content')

        </div>

    </div>

@stop