@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1 class="my-4">Admin Dashboard</h1>

    <div class="row">
        <div class="col">
            <a href="{{ route('admin.accounts.index', [app()->getLocale()]) }}" class="a-box">
                Users
            </a>
        </div>
        <div class="col">
            <a href="{{ route('admin.jobs.index', [app()->getLocale()]) }}" class="a-box">
                Jobs
            </a>
        </div>
    </div>
    <br><br>

    <?php
    $users_chart = array_reverse($users_chart);
    $labels = [];
    $datasets = [];
    foreach ($users_chart as $uc) {
        $users_labels[] = $uc->yearmonth;
        $users_datasets[] = $uc->sum;
    }
    foreach ($jobs_chart as $uc) {
        $jobs_labels[] = $uc->yearmonth;
        $jobs_datasets[] = $uc->sum;
    }
    ?>
    <div class="row">
        <div class="col-md-6">
            <chart-component
                :chartdata="{
                    labels: <?= htmlspecialchars(json_encode($users_labels, ENT_QUOTES)) ?>,
                    datasets: [
                        {
                            label: 'Users',
                            backgroundColor: 'rgb(238, 228, 10, 0.7)',
                            data: <?= htmlspecialchars(json_encode($users_datasets, ENT_QUOTES)) ?>
                        }
                    ]
                }"
            ></chart-component>
        </div>
        <div class="col-md-6">
            <chart-component
                :chartdata="{
                    labels: <?= htmlspecialchars(json_encode($jobs_labels, ENT_QUOTES)) ?>,
                    datasets: [
                        {
                            label: 'Jobs',
                            backgroundColor: 'rgb(238, 228, 10, 0.7)',
                            data: <?= htmlspecialchars(json_encode($jobs_datasets, ENT_QUOTES)) ?>
                        }
                    ]
                }"
            ></chart-component>
        </div>
    </div>

</div>
@endsection
