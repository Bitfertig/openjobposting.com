@extends('layouts.app')


@section('content')
<div class="container">

    <h1 class="my-5">Jobs</h1>

    @include('partials.jobsearch')
    <br>


    <div>
        @foreach($jobs as $job)
            <a href="{{ route('jobs.show', [app()->getLocale(), $job->id]) }}" class="job-list-item">
                <div class="title">{{ $job->title }}</div>
                <div class="sub">
                    <div class="organisation">
                        <small>{{ $job->organisation_name }}</small>
                    </div>
                    <div class="date">
                        <small>{{ $job->created_at->format('d.m.Y') }}</small>
                    </div>
                </div>
            </a>
        @endforeach
        @if( !count($jobs ?? []) )
            <div class="text-center font-italic">No result for "{{ $q }}".</div>
        @endif
    </div>

    {{ $jobs->links() }}

</div>
@endsection


@section('scripts')
<style>

</style>
@endsection
