@extends('layouts.app')

@section('content')
<?php
$jobform = [
    'title' => $job->title ?? '',
    'description' => $job->description ?? '',
    'date_posted' => $job->date_posted ? $job->date_posted->format('Y-m-d') : '',
    'valid_through' => $job->valid_through ? $job->valid_through->format('Y-m-d') : '',
    'organization_name' => $job->organization_name ?? '',
    'organization_url' => $job->organization_url ?? '',
    'organization_logo_url' => $job->organization_logo_url ?? '',
    'employment_type' => $job->employment_type ?? 'FULL_TIME',
    'location_street' => $job->location_street ?? '',
    'location_locality' => $job->location_locality ?? '',
    'location_postal_code' => $job->location_postal_code ?? '',
    'location_region' => $job->location_region ?? '',
    'location_country' => $job->location_country ?? '',
    'salary_quantitative' => $job->salary_quantitative ?? '',
    'salary_unit' => $job->salary_unit ?? '',
    'salary_currency' => $job->salary_currency ?? '',
];
?>
<div class="container my-5">


    <h1 class="my-4">{{ __('Job entry') }}</h1>


    @if( $errors->any() )
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ !$job->exists ? route('jobs.store', app()->getLocale()) : route('jobs.update', [app()->getLocale(), $job->id]) }}" enctype="multipart/form-data">
        @if( $job->exists )
            @method('PATCH')
        @endif
        @csrf

        <div class="row">

            <div class="col col-12 col-md-8">
                <div class="form-group">
                    <label for="date_posted">{{ __('Date posted') }}</label>
                    <input type="date" class="form-control" name="date_posted" id="date_posted" aria-describedby="date_posted_help" v-model="jobform.date_posted">
                    <!-- <small id="date_posted_help" class="form-text text-muted">help.</small> -->
                </div>
            </div>
            <div class="col col-12 col-md-4"></div>

            <div class="col col-12 col-md-8">
                <div class="form-group">
                    <label for="valid_through">{{ __('Expire date') }}</label>
                    <input type="date" class="form-control" name="valid_through" id="valid_through" aria-describedby="valid_through_help" v-model="jobform.valid_through">
                    <!-- <small id="valid_through_help" class="form-text text-muted">help.</small> -->
                </div>
            </div>
            <div class="col col-12 col-md-4"></div>

            <div class="col col-12 col-md-8">
                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="title_help" v-model="jobform.title">
                    <!-- <small id="title_help" class="form-text text-muted">help.</small> -->
                </div>
            </div>
            <div class="col col-12 col-md-4"></div>

            <div class="col col-12 col-md-8">
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" id="description" :rows="textarea_rows(jobform.description, 10, 50)" aria-describedby="description_help" v-model="jobform.description"></textarea>
                    <!-- <small id="description_help" class="form-text text-muted">help.</small> -->
                </div>
            </div>
            <div class="col col-12 col-md-4"></div>

            <div class="col col-12 col-md-8">
                <div class="form-group">
                    <label for="organization_name">{{ __('Organization name') }}</label>
                    <input type="text" class="form-control" name="organization_name" id="organization_name" aria-describedby="organization_name_help" v-model="jobform.organization_name">
                    <!-- <small id="organization_help" class="form-text text-muted">help.</small> -->
                </div>

                <div class="form-group">
                    <label for="organization_url">{{ __('Organization URL') }}</label>
                    <input type="url" class="form-control" name="organization_url" id="organization_url" aria-describedby="organization_url_help" v-model="jobform.organization_url">
                    <!-- <small id="organization_url_help" class="form-text text-muted">help.</small> -->
                </div>
            </div>
            <div class="col col-12 col-md-4"></div>

            <div class="col col-12 col-md-8">
                <div class="form-group">
                    <label for="employment_type">{{ __('Employment type') }}</label>
                    <select class="form-control" name="employment_type" id="employment_type" aria-describedby="employment_type_help" v-model="jobform.employment_type">
                        <option value="FULL_TIME">{{ __('Full time') }}</option>
                        <option value="PART_TIME">{{ __('Part time') }}</option>
                        <option value="CONTRACTOR">{{ __('Contractor') }}</option>
                        <option value="TEMPORARY">{{ __('Temporary') }}</option>
                        <option value="INTERN">{{ __('Intern') }}</option>
                        <option value="VOLUNTEER">{{ __('Volunteer') }}</option>
                        <option value="PER_DIEM">{{ __('Per diem') }}</option>
                        <option value="OTHER">{{ __('Other') }}</option>
                    </select>
                    <!-- <small id="employment_type_help" class="form-text text-muted">help.</small> -->
                </div>
            </div>
            <div class="col col-12 col-md-4"></div>

            <div class="col col-12 col-md-8">
                <div class="form-group">
                    <label for="location_street">{{ __('Street') }}</label>
                    <input type="text" class="form-control" name="location_street" id="location_street" aria-describedby="location_street_help" v-model="jobform.location_street">
                    <!-- <small id="location_street_help" class="form-text text-muted">help.</small> -->
                </div>

                <div class="form-group">
                    <label for="location_postal_code">{{ __('Postal code') }}</label>
                    <input type="text" class="form-control" name="location_postal_code" id="location_postal_code" aria-describedby="location_postal_code_help" v-model="jobform.location_postal_code">
                    <!-- <small id="location_postal_code_help" class="form-text text-muted">help.</small> -->
                </div>

                <div class="form-group">
                    <label for="location_locality">{{ __('Locality') }}</label>
                    <input type="text" class="form-control" name="location_locality" id="location_locality" aria-describedby="location_locality_help" v-model="jobform.location_locality">
                    <!-- <small id="location_locality_help" class="form-text text-muted">help.</small> -->
                </div>

                <div class="form-row">
                    <div class="form-group col-6 col-md-6">
                        <label for="location_country">{{ __('Country') }}</label>
                        <select class="form-control" name="location_country" id="location_country" aria-describedby="location_country_help" v-model="jobform.location_country">
                            <template v-for="(item, index) in countryFlagEmoji.list">
                                <option :key="index" :value="item.code">@{{ item.name }} @{{ item.emoji }}</option>
                            </template>
                        </select>
                        <!-- <small id="location_country_help" class="form-text text-muted">help.</small> -->
                    </div>

                    <div class="form-group col-6 col-md-6">
                        <label for="location_region">{{ __('Region') }}</label>
                        <select class="form-control" name="location_region" id="location_region" aria-describedby="help_location_region" v-model="jobform.location_region">
                            <template v-for="(item, index) in iso31662.filter((item) => { return item.parent == jobform.location_country; })">
                                <option :key="index" :value="item.code">@{{ item.name }}</option>
                            </template>
                        </select>
                        <!-- <small id="help_location_region" class="form-text text-muted">help.</small> -->
                    </div>
                </div>


            </div>
            <div class="col col-12 col-md-4"></div>

            <div class="col col-12 col-md-8">
                <div class="form-group">
                    <label for="salary_quantitative">{{ __('Salary quantitative') }}</label>
                    <input type="text" class="form-control" name="salary_quantitative" id="salary_quantitative" aria-describedby="help_salary_quantitative" v-model="jobform.salary_quantitative">
                    <small id="help_salary_quantitative" class="form-text text-muted">Examples: 40.00, "by agreement / qualification", ...</small>
                </div>
                <div class="form-group">
                    <label for="salary_unit">{{ __('Salary unit') }}</label>
                    <input type="text" class="form-control" name="salary_unit" id="salary_unit" aria-describedby="salary_unit_help" v-model="jobform.salary_unit">
                    <small id="salary_unit_help" class="form-text text-muted">Examples: HOUR, ...</small>
                </div>
                <div class="form-group">
                    <label for="salary_currency">{{ __('Salary currency') }}</label>
                    <input type="text" class="form-control" name="salary_currency" id="salary_currency" aria-describedby="salary_currency_help" v-model="jobform.salary_currency">
                    <small id="salary_currency_help" class="form-text text-muted">Examples: EUR, USD, ...</small>
                </div>
            </div>
            <div class="col col-12 col-md-4"></div>

            <div class="col col-md-12">
                <div class="form-group">
                    <a class="btn btn-secondary" href="{{ route('jobs.index', app()->getLocale()) }}">Cancel</a>
                    <input type="submit" class="btn btn-primary" value="Publish">
                </div>
            </div>

        </div>

    </form>


</div>
@endsection


@section('scripts')
<script>
window.jobform = <?= json_encode($jobform) ?>; // used in jobFormMixin.js
</script>
@endsection
