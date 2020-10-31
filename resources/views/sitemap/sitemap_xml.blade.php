<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

@foreach($sites as $site)
<url><loc>{{ $site->loc }}</loc><lastmod>{{ $site->lastmod }}</lastmod></url>
@endforeach

@foreach($jobs as $job)
<url><loc>{{ env('APP_URL') }}/{{ $locale }}/jobs/{{ $job->id }}</loc><lastmod>{{ $job->updated_at->format('Y-m-d') }}</lastmod></url>
@endforeach

</urlset>
