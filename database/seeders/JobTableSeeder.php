<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $job = new Job();
        $job->user_id = 1;
        $job->title = 'Reinigungskraft';
        $job->description = <<<DESCRIPTION
        Zur Erweiterung unseres Teams suchen wir ab sofort eine Reinigungskraft die sich engagiert einbringen möchte.

        ## Das bringst du mit
        * Teamfähigkeit
        * Pünktlichkeit
        * Gründlichkeit
        * Zuverlässichkeit
        * Flexibilität
        * gute Laune :-)

        ## Das sind deine Aufgaben
        * Reinigung im Restaurant, Rezeption und Gästezimmer
        * Fenster putzen
        * Kontrolle des Zimmerinventars
        * Wäsche waschen
        * aushelfen im Servicebereich

        ## Das bieten wir dir
        * Einarbeitung
        * hohe Eigenverantwortlichkeit
        * kurze Entscheidungswege
        * ein nettes Team
        DESCRIPTION;
        $job->date_posted = Carbon::now();
        $job->valid_through = Carbon::now()->modify('+1 year');
        $job->organization_name = 'Hotel Wolterdinger Hof';
        $job->organization_url = 'http://www.wolterdinger-hof.de';
        $job->employment_type = 'OTHER';
        $job->location_street = 'In der Reith 5';
        $job->location_postal_code = '29614';
        $job->location_locality = 'Soltau';
        $job->location_region = 'DE-NI';
        $job->location_country = 'DE';
        $job->save();

        if (App::Environment() === 'local')
        {
            for($i = 0; $i < 20; $i++) {
                $job = new Job();
                $job->title = Str::random(10);
                $job->organization_name = Str::random(15);
                $job->save();
            }
        }
    }
}

