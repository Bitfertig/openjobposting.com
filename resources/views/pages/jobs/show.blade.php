@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="mb-4">{{ $job->title }}</h1>

            <div class="my-4">
                @if($job->employment_type)
                    <span class="badge badge-pill badge-light" title="employment type">{{ $job->employment_type }}</span>
                @endif
            </div>

            <div>{{ $job->description_html }}</div>


        </div>
        <div class="col-md-4">

            <div class="job-data">
                <h2>Organisation</h2>
                <div class="organisation">
                    @if( !empty($job->organization_url) )
                        <a href="{{ $job->organization_url }}" target="_blank">
                            {{ $job->organization_name }}
                        </a>
                    @else
                        {{ $job->organisation_name }}
                    @endif
                </div>
            </div>

            <div class="job-data">
                <h2>Job Location</h2>
                {{ $job->location_street }}<br>
                {{ $job->location_postal_code }} {{ $job->location_locality }}<br>
                {{ $job->location_region }}<br>
                {{ $job->location_country }}
            </div>

            {{-- <div class="job-data">
                <h2>Salary</h2>
                {{ $job->quantitative }}
                {{ $job->currency }}
                {{ $job->unit }}
            </div> --}}

            <div class="job-data">
                <h2>Until</h2>
                {{ $job->valid_through->format('d.m.Y') }}
            </div>


        </div>
    </div>
</div>
@endsection

@section('scripts')
<?php
$sjp = new SchemaJobposting();
$sjp->set('datePosted', $job->date_posted->format('Y-m-d'));
$sjp->set('validThrough', $job->valid_through->format('Y-m-d'));
$sjp->set('title', $job->title);
$sjp->set('description', $job->description);
$sjp->set('employmentType', [$job->employment_type]); // FULL_TIME, PART_TIME, contract, temporary, seasonal, internship
$sjp->set('hiringOrganization.name', $job->organization_name);
if ( !empty($job->organization_url) ) $sjp->set('hiringOrganization.sameAs', $job->organization_url);
#$sjp->set('hiringOrganization.logo', '');
$sjp->set('jobLocation.address.streetAddress', $job->location_street);
$sjp->set('jobLocation.address.postalCode', $job->location_postal_code);
$sjp->set('jobLocation.address.addressLocality', $job->location_locality);
$sjp->set('jobLocation.address.addressRegion', $job->location_region); // adressRegion (Land-Bundesland als ISO 3166-2 Code) https://de.wikipedia.org/wiki/ISO_3166-2
$sjp->set('jobLocation.address.addressCountry', $job->location_country);
#$sjp->set('baseSalary.currency', 'EUR');
#$sjp->set('baseSalary.value', 'nach Vereinbarung / Qualifikation');
//echo '<pre><mark>|'.$sjp->toJson();echo '|</mark></pre>';
echo $sjp->toScript();
?>
@endsection
