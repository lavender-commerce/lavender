@extends('layouts.split')

@section('head.title')
Register or Login
@stop

@section('left')
    <h5>New Customers</h5>
    <p>By creating an account with our store, you will be able to view and track your orders.</p>
    <a href="{{ url('customer/register') }}" class="button">Register now!</a>
@stop

@section('right')
    <h5>Registered Customers</h5>
    <p>If you have an account with us, please log in.</p>
    @form('customer_login')
@stop