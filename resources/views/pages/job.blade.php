@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <h1>{{ $job->title }}</h1>

        <div class="organisation text-right">
            <small>{{ $job->organisation_name }}</small>
        </div>

        </div>
    </div>
</div>
@endsection
