@extends('layouts.default')

@section('main')

<section class="content">

 <div class="row">

    <div class="six columns">

        @yield('left')

    </div>

    <div class="six columns">

        @yield('right')

    </div>

  </div>

</section>

@stop