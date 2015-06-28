@extends('layouts.empty')

@section('head.title')
Backend Login
@stop

@section('header')

    <h1>

        <a href="{{ url('backend')}} ">

            <image src="{{ asset(config('store.logo')) }}" alt="{{ config('store.name') }}" width="55" height="55" />

            {{ config('store.name') }}

        </a>

    </h1>

@stop

@section('main')

    @yield('backend.login.before')

    @form('admin_login')

    @yield('backend.login.after')

@stop