<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Support\Str;
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
            for($i = 0; $i < 20; $i++) {
                $job = new Job();
                $job->title = Str::random(10);
                /* $job->description = ''; */
                //$job->date_posted = '';
                /* $job->valid_through = ''; */
                $job->organisation_name = Str::random(15);
                /* $job->organisation_url = '';
                $job->employment_type = '';
                $job->location_street = '';
                $job->location_postal_code = '';
                $job->location_locality = '';
                $job->location_country = ''; */
                $job->save();
            }
        }
    }
}

