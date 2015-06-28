@extends('layouts.single')

@section('head.title')
Product View
@stop

@section('content')

    <h1>{{ $product->name }}</h1>

    @include('catalog.product.price', ['product' => $product])

    @form('cart_item_add', ['product' => $product])

@stop