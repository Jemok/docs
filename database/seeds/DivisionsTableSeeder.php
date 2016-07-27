<?php

use Illuminate\Database\Seeder;
use App\User;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1);

        $user->divisions()->create([
            'division' => 'A'
        ]);
    }
}
