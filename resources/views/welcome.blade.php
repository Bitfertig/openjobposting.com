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
        <div>
            <input type="search" name="q" value="{{ $q ?? '' }}" placeholder="" autofocus class="form-control form-control-lg w-100 text-center border-primary" style="border-width:3px;">
        </div>
        <div class="d-inline-block mt-2 mb-4 mx-auto">
            <input type="submit" value="Suche" class="btn btn-lg btn-primary px-5">
        </div>
    </form>


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
    </div>

    {{ $jobs->links() }}

</div>
@endsection
