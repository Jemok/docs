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

        $user->divisions()->create([
            'division' => 'B'
        ]);

        $user->divisions()->create([
            'division' => 'C'
        ]);

        $user->divisions()->create([
            'division' => 'D'
        ]);

        $user->divisions()->create([
            'division' => 'E'
        ]);

        $user->divisions()->create([
            'division' => 'F'
        ]);

        $user->divisions()->create([
            'division' => 'G'
        ]);

    }
}
