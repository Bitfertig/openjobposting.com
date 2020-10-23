@extends('layouts.app')


@section('content')
<div class="container">

    <div>
        <input type="search" name="q" value="" placeholder="" autofocus class="w-100">
        <input type="submit" value="Suche">
    </div>


    {{-- route('jobs', [$job->id][app()->getLocale()]) --}}

    <div>
        @foreach($jobs as $job)
            <a href="{{ route('jobs.show', [app()->getLocale(), $job->id]) }}" class="d-block my-3 p-2 bg-primary text-white">
                <div class="title">{{ $job->title }}</div>
                <div class="organisation text-right">
                    <small>{{ $job->organisation_name }}</small>
                </div>
            </a>
        @endforeach
    </div>

    {{ $jobs->links() }}

</div>


<div class="text-center">

    <a href="http://www.bitfertig.de/impressum/">
        Impress
    </a>

    <a href="http://www.bitfertig.de/datenschutzerklaerung/">
        Privacy policy
    </a>

    <br>

    <a href="{{ config('app.url') }}">
        Jobsignalfire.com
    </a>

</div>
@endsection
