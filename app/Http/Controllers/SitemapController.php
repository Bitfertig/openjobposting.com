<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sitemapindex_xml(Request $request)
    {
        $locales = config('app.available_locales');
        return response()
        ->view('sitemap.sitemapindex_xml', [
            'locales' => $locales,
        ])
        ->header('Content-Type', 'text/xml');
    }

    public function sitemap_xml(Request $request, $locale)
    {
        #$locales = config('app.available_locales');

        $sites = [];
        $sites[] = (object)[
            'loc' => route('welcome.index', app()->getLocale()),
            'lastmod' => carbon(filemtime(resource_path('views').'/welcome.blade.php'))->format('Y-m-d'),
        ];
        $sites[] = (object)[
            'loc' => route('jobs.index', app()->getLocale()),
            'lastmod' => carbon(filemtime(resource_path('views').'/pages/jobs/index.blade.php'))->format('Y-m-d'),
        ];

        $jobs = Job::orderBy('updated_at', 'DESC')->get();

        return response()
        ->view('sitemap.sitemap_xml', [
            'locale' => $locale,
            'sites' => $sites,
            'jobs' => $jobs,
        ])
        ->header('Content-Type', 'text/xml');
    }

}
