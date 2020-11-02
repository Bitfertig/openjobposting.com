@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Jobs</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
