<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach (config('app.available_locales') as $locale_index => $locale)
    <sitemap>
        <loc>{{ env('APP_URL') }}/sitemap_{{ $locale }}.xml</loc>
        <lastmod>{{ date('Y-m-01') }}</lastmod>
    </sitemap>
@endforeach
</sitemapindex>
