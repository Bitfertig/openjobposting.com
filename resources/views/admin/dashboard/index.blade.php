@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Admin Dashboard</h1>

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
