@extends('layouts.default')

@section('main')

<section class="content">

 <div class="row">

    <div class="four columns">

        @yield('sidebar')

    </div>

    <div class="eight columns">

        @yield('content')

    </div>

  </div>

</section>

@stop