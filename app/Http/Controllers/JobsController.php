<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $job = new Job();
        return view('pages.jobs.form', [
            'job' => $job,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        return $this->upsert($request, $locale, null);
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
    public function update(Request $request, $locale, Job $job)
    {
        return $this->upsert($request, $locale, $job);
    }

    /**
     * Delete confirmation of the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $locale Language
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $locale, Job $job)
    {
        return view('pages.jobs.delete', [
            'job' => $job,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale, Job $job)
    {
        abort_if($job->exists && request()->user()->id != $job->user_id, 404);
        $job->delete();
        return redirect()->route('jobs.index', [app()->getLocale()])->with(['deleted' => 'Item deleted.']);
    }

    public function upsert(Request $request, $locale, Job $job = null)
    {
        #dd($request);

        // Validate
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'date_posted' => 'required',
            'valid_through' => 'required',
            'organization_name' => 'required',
            'organization_url' => 'nullable',
            'employment_type' => 'required',
            'location_street' => 'required',
            'location_postal_code' => 'required',
            'location_locality' => 'required',
            'location_region' => 'nullable',
            'location_country' => 'required',
        ];
        $attributes = $request->validate($rules);
        $validator = Validator::make($request->all(), $rules);

        #dd($validator->fails());
        if ( $validator->passes() ) {
            $job = $job ?? Job::findOrFail($job);

            abort_if($job->exists && auth()->user() != $job->user_id, 404);

            $job->fill($attributes);
            /* $job->title = $request->title;
            $job->description = $request->description;
            $job->date_posted
            $job->valid_through
            $job->organization_name = $request->organization_name;
            $job->organization_url = $request->organization_url;
            $job->employment_type = $request->employment_type;
            $job->location_street = $request->location_street,
            $job->location_postal_code = $request->,
            $job->location_locality = $request->,
            $job->location_region = $request->,
            $job->location_country = $request->, */
            #dd($job);
            $job->save();

            #Session::flash('message', 'Successfully created job!');
            return redirect()->route('jobs.show', [app()->getLocale(), $job->id]);
        }
        else {
            return back()->withErrors($validator)->withInput();
        }

    }

}
