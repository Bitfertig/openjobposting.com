@extends('layouts.app')


@section('content')
<div class="head">
    <div class="container text-center py-5">
    Free job offering on the internet.
    </div>
</div>
<div class="container">

    <form method="get" action="{{ route('welcome.index', app()->getLocale()) }}">
        <!-- @csrf -->

        <div class="jobsearch">
            <label for="jobsearch-input">
                <span class="jobsearch-icon">
                    <svg width="23" height="23" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </span>
                <input type="search" name="q" id="jobsearch-input" value="{{ $q ?? '' }}" placeholder="" autofocus class="jobsearch-input">
                <button type="submit" title="Suche" class="jobsearch-button">
                    <svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
                    </svg>
                </button>
            </label>
        </div>

    </form><br>


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

    {{ $jobs->links() }}

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
