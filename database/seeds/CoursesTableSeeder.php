<?php

use Illuminate\Database\Seeder;
use App\Campus;
use App\User;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campus = Campus::findOrFail(1);
        $user = User::findOrFail(1);

        $campus->course()->create([
           'course_name' => 'Bachelor of Business and Information Technology',
            'user_id'    => $user->id
        ]);
    }
}
