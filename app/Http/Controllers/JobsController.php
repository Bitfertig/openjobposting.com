<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $locale)
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('pages.jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $locale)
    {
        return view('pages.jobs.form', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* date_posted: '',
        valid_through: '',
        title: '',
        description: '',
        organization: '',
        organization_url: '',
        employment_type: 'FULL_TIME',
        street: '',
        city: '',
        postal_code: '',
        country: '', */

        // Validate
        $rules = array(
            'date_posted' => 'required',
            'valid_through' => 'required',
            'title' => 'required',
            'description' => 'required',
            'organization' => 'required',
            'organization_url' => 'required',
            'employment_type' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        #dd($validator->passes());

        // process the login
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            // store
            /* #$job = Job::findOrFail($job);
            $job->title = $request->title;
            $job->save();

            // redirect
            Session::flash('message', 'Successfully created job!');
            return redirect()->route('jobs.show', [app()->getLocale(), $job->id]); */
        }

        echo 1;exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $locale, Job $job)
    {
        $job->description_html = markdown_to_html($job->description);
        $job = $job;
        return view('pages.jobs.show', [
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $locale, Job $job)
    {
        return view('pages.jobs.form', [
            'job' => $job,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function upsert(Request $request, Job $job = null)
    {
        if ( $job ) {}




    }

}
