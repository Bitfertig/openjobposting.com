<?php

namespace Database\Seeders;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initial User
        $user = User::create([
            'firstname' => 'Aurelian',
            'lastname' => 'Hermand',
            'email' => 'mail@bitfertig.de',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make( env('INITIAL_USER_PASSWORD') ),
            'remember_token' => Str::random(10)
        ]);
        $user->assignRole('developer');

    }
}
