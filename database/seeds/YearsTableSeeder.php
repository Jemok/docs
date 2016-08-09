<?php

use Illuminate\Database\Seeder;
use App\User;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1);

        $user->years()->create([
            'year' => '2016'
        ]);

        $user->years()->create([
            'year' => '2015'
        ]);

        $user->years()->create([
            'year' => '2014'
        ]);

        $user->years()->create([
            'year' => '2013'
        ]);

        $user->years()->create([
            'year' => '2012'
        ]);

        $user->years()->create([
            'year' => '2011'
        ]);

        $user->years()->create([
            'year' => '2010'
        ]);
    }
}
