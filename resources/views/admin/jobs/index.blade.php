@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1 class="my-4">Jobs</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Organization</th>
                <th>Country</th>
                <th>Valid through</th>
                <th>Created</th>
                <th>Impressions</th>
                <th>Gear</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->id }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->organization_name }}</td>
                    <td>{{ $job->location_country }}</td>
                    <td>{{ $job->valid_through ? $job->valid_through->format('d.m.Y') : '' }}</td>
                    <td>{{ $job->created_at->format('d.m.Y') }}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
