@extends('layouts.app')


@section('content')
<div class="head">
    <div class="container text-center py-5">
    Free job offering on the internet.
    </div>
</div>
<div class="container">

    <form method="get" action="{{ route('welcome.index', app()->getLocale()) }}">
        <!-- @csrf -->

        <div class="jobsearch">
            <label for="jobsearch-input">
                <span class="jobsearch-icon">
                    <svg width="23" height="23" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </span>
                <input type="search" name="q" id="jobsearch-input" value="{{ $q ?? '' }}" placeholder="" autofocus class="jobsearch-input">
                <button type="submit" title="Suche" class="jobsearch-button">
                    <svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
                    </svg>
                </button>
            </label>
        </div>

    </form><br>


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
