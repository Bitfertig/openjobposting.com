@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1>Account</h1>

    <div>
        Name: {{ $user->lastname }}, {{ $user->firstname }}<br>
        E-Mail: {{ $user->email }}
    </div>

    <a href="{{ route('account.edit_password', app()->getLocale()) }}">{{ __('Password change') }}</a>

</div>
@endsection
