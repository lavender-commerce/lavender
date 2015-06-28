@extends('layouts.single')

@section('head.title')
Category View
@stop

@section('content')

<h1>{{ $category->name }}</h1>

@include('catalog.product.list', ['products' => $products])

@stop