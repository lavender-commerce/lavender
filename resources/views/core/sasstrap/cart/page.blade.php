@extends('layouts.default')

@section('head.title')
    Shopping Cart
@stop

@section('main')

    <div class="row">

        <div class="six columns">

            <h5>Your Shopping Cart</h5>

        </div>

        <div class="six columns right">

            <a href="{{ url('/') }}">Keep Shopping</a>

            <span>or</span>

            <a href="{{ url('checkout') }}" class="button">Continue to Checkout</a>

        </div>

    </div>

    @yield('cart.items')

    <div class="row">

        <div class="six columns">

            <p><strong>shipping calculator</strong></p>

        </div>

        <div class="six columns right">

            <div class="cart-totals">

                @foreach($totals as $label => $total)

                <div class="row">

                    <div class="six columns">{{ $label }}</div>

                    <div class="six columns">{{ $total }}</div>

                </div>

                @endforeach

            </div>

            <a href="{{ url('checkout') }}" class="button">Continue to Checkout</a>

        </div>
    </div>

@stop