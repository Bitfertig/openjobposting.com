@extends('layouts.app')

@section('content')
<div class="container my-5">


    <h1 class="my-4">{{ __('Job delete') }}</h1>


    <form method="POST" action="{{ route('intern.jobs.update', [app()->getLocale(), $job->id]) }}">
        @method('DELETE')
        @csrf

        <div class="row">
            <div class="col col-md-6">

                <p>
                    Delete this job entry.
                </p>

                <div class="form-group">
                    <a href="{{ route('intern.jobs.index', [app()->getLocale()]) }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>

            </div>
            <div class="col col-md-6">

            </div>
        </div>

    </form>


</div>
@endsection
