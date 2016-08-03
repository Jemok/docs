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
            'year' => '2013'
        ]);
    }
}
