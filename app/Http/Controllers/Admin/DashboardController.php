<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_count = User::count();
        $jobs_count = Job::count();

        $users_chart = DB::select(
            DB::raw("
                SELECT
                    DATE_FORMAT(users.created_at, '%Y-%m') AS yearmonth,
                    COUNT(users.id) AS total,
                    (SELECT COUNT(*) FROM `users` WHERE DATE_FORMAT(users.created_at, '%Y-%m') <= yearmonth) AS sum
                FROM users
                GROUP BY yearmonth
                ORDER BY yearmonth DESC
            ")
        );
        #dd($users_chart);

        $jobs_chart = DB::select(
            DB::raw("
                SELECT
                    DATE_FORMAT(jobs.created_at, '%Y-%m') AS yearmonth,
                    COUNT(jobs.id) AS total,
                    (SELECT COUNT(*) FROM `jobs` WHERE DATE_FORMAT(jobs.created_at, '%Y-%m') <= yearmonth) AS sum
                FROM jobs
                GROUP BY yearmonth
                ORDER BY yearmonth DESC
            ")
        );

        return view('admin.dashboard.index', [
            'users_count' => $users_count,
            'jobs_count' => $jobs_count,
            'users_chart' => $users_chart,
            'jobs_chart' => $jobs_chart,
        ]);
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
}
