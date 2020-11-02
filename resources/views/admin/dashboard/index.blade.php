@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1 class="my-4">Admin Dashboard</h1>

    <a href="{{ route('admin.accounts.index', [app()->getLocale()]) }}">
        Users
        {{ $users_count }}
    </a>

    <a href="{{ route('admin.jobs.index', [app()->getLocale()]) }}">
        Jobs
        {{ $jobs_count }}
    </a>

</div>
@endsection
