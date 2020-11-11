@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1 class="my-4">Accounts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lastname, Firstname</th>
                <th>Joboffers</th>
                <th>Gear</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->lastname }}, {{ $user->firstname }}</td>
                    <td>{{ $user->jobs->count() }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
