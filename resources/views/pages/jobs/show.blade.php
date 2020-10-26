@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>{{ $job->title }}</h1>

            <div>{{ $job->description_html }}</div>


            <div>
            </div>

            <h2>Organisation</h2>
            <div class="organisation">
                @if( !empty($job->organisation_url) )
                    <a href="{{ $job->organisation_name }}">
                        {{ $job->organisation_name }}
                    </a>
                @else
                    {{ $job->organisation_name }}
                @endif
            </div>


        </div>
    </div>
</div>
@endsection
