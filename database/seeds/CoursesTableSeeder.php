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

        $campus->course()->create([
            'course_name' => 'Medicine',
            'user_id'    => $user->id
        ]);

        $campus->course()->create([
            'course_name' => 'Financial Engineering',
            'user_id'    => $user->id
        ]);

        $campus->course()->create([
            'course_name' => 'Actuarial science',
            'user_id'    => $user->id
        ]);

        $campus->course()->create([
            'course_name' => 'Human Resource',
            'user_id'    => $user->id
        ]);

        $campus->course()->create([
            'course_name' => 'Food Science',
            'user_id'    => $user->id
        ]);

        $campus->course()->create([
            'course_name' => 'Computer Science',
            'user_id'    => $user->id
        ]);
    }
}
