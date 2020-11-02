@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Accounts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lastname, Firstname</th>
                <th>Joboffers</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->lastname }}, {{ $user->firstname }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
