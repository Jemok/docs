<?php

use Illuminate\Database\Seeder;
use App\User;

class MonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1);

        $user->months()->create([

            'month' => 'September'

        ]);
    }
}
