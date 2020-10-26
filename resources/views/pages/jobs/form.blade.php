@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="app">
        <jobform-component></jobform-component>
    </div>

</div>
@endsection


@section('scripts')
<?php
$form = [
    'action' => route('jobs.store', app()->getLocale()),
    'csrf' => csrf_token(),
];
?>
<script>
window.form = <?= json_encode($form) ?>;
</script>
@endsection
