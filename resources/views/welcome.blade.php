@extends('layouts.app')


@section('content')
<div class="head">
    <div class="container text-center py-5">
    Free job offering on the internet.
    </div>
</div>
<div class="container">

    @include('partials.jobsearch')
    <br>


    <div>
        @foreach($jobs as $job)
            <a href="{{ route('jobs.show', [app()->getLocale(), $job->id]) }}" class="job-list-item">
                <div class="title">{{ $job->title }}</div>
                <div class="sub">
                    <div class="organisation">
                        <small>{{ $job->organisation_name }}</small>
                    </div>
                    <div class="date">
                        <small>{{ $job->created_at->format('d.m.Y') }}</small>
                    </div>
                </div>
            </a>
        @endforeach
        @if( !count($jobs ?? []) )
            <div class="text-center font-italic">No result for "{{ $q }}".</div>
        @endif
    </div>

    <a href="{{ route('jobs.index', [app()->getLocale()]) }}">{{ __('More jobs ...') }}</a>

</div>


<?php
$social = (object)[
    'title' => 'OpenJobPosting',
    'url' => 'https://www.openjobposting.com',
];
?>
<div id="socials">
    <div class="inner">
        <div class="bubbles">
            <div class="inner">
                <?php for($i = 1; $i <= 30; $i++) { echo '<div class="bubble bubble-'.$i.'"></div>'; } ?>
            </div>
        </div>
        <div class="links">
            <a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{ $social->url }}&t={{ $social->title }}" target="_blank" title="Share on Facebook">
                <svg class="bi" width="32" height="32" fill="currentColor">
                    <use xlink:href="social-icons.svg#facebook"/>
                </svg>
            </a>
            <a rel="nofollow" href="https://twitter.com/share?url={{ $social->url }}&text={{ $social->title }}" target="_blank" title="Share on Twitter">
                <svg class="bi" width="32" height="32" fill="currentColor">
                    <use xlink:href="social-icons.svg#twitter"/>
                </svg>
            </a>
            <a rel="nofollow" href="whatsapp://send?text={{ $social->url }}" data-action="share/whatsapp/share" title="Share on Whatsapp">
                <svg class="bi" width="32" height="32" fill="currentColor">
                    <use xlink:href="social-icons.svg#whatsapp"/>
                </svg>
            </a>
            <a rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $social->url }}&t={{ $social->title }}" target="_blank" title="Share on Linkedin">
                <svg class="bi" width="32" height="32" fill="currentColor">
                    <use xlink:href="social-icons.svg#linkedin"/>
                </svg>
            </a>
            <a rel="nofollow" href="http://www.reddit.com/submit?url={{ $social->url }}" target="_blank" title="Share on Reddit">
                <svg class="bi" width="32" height="32" fill="currentColor">
                    <use xlink:href="social-icons.svg#reddit"/>
                </svg>
            </a>
            <a rel="nofollow" href="mailto:?subject={{ $social->title }}&body={{ $social->url }}" title="Share on Mail">
                <svg class="bi" width="32" height="32" fill="currentColor">
                    <use xlink:href="social-icons.svg#mail"/>
                </svg>
            </a>
        </div>
    </div>
</div>


<div class="container">

</div>
@endsection


@section('scripts')
<style>

</style>
@endsection
