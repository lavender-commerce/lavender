@extends('layouts.email')

@section('content')

<h1>{{ trans('account.email.confirmation.subject') }}</h1>

<p>{{ trans('account.email.confirmation.greetings') }},</p>

<p>{{ trans('account.email.confirmation.body') }}</p>

<a href='{{{ url("customer/confirm/{$user['confirmation_code']}") }}}'>
{{{ url("customer/confirm/{$user['confirmation_code']}") }}}
</a>

<p>{{ trans('account.email.confirmation.farewell') }}</p>

@stop


