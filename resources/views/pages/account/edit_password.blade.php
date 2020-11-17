@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1>{{ __('Password change') }}</h1>


    @if (session('errors'))
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('account.update_password', app()->getLocale()) }}">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="password">{{ __('Current password') }}</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="help_password" required autofocus>
            <small id="help_password" class="form-text text-muted">Your old password.</small>
        </div>

        <div class="form-group">
            <label for="new_password">{{ __('New password') }}</label>
            <input type="password" class="form-control" name="new_password" id="new_password" aria-describedby="help_new_password" required minlength="6">
            <small id="help_new_password" class="form-text text-muted">Your new password.</small>
        </div>

        <div class="form-group">
            <label for="new_password_confirmation">{{ __('New password confirmation') }}</label>
            <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" aria-describedby="help_new_password_confirmation" required minlength="6">
            <small id="help_new_password_confirmation" class="form-text text-muted">Your new password again.</small>
        </div>

        <input type="submit" class="btn btn-primary">

    </form>

</div>
@endsection
