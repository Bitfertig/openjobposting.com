<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::Environment() === 'local')
        {
            // Example
            $job = new Job();
            $job->title = '';
            $job->description = '';
            $job->date_posted = '';
            $job->valid_through = '';
            $job->organisation_name = '';
            $job->organisation_url = '';
            $job->employment_type = '';
            $job->location_street = '';
            $job->location_postal_code = '';
            $job->location_locality = '';
            $job->location_country = '';
            $job->save();
        }
    }
}
