<?php

use Illuminate\Database\Seeder;
use App\User;

class CampusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1);

        $user->campus()->create([

            'campus_name' => 'jkuat'
        ]);
    }
}
