<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Tables that are seeded
     * @var array
     */
    protected $tables = [
        'users',
        'campuses',
        'courses',
        'year_of_intakes',
        'month_of_intakes',
        'class_divisions'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        $this->call(UsersTableSeeder::class);
        $this->call(CampusesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(MonthsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
    }

    /**
     * Handle database preparation before seeding
     */
    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($this->tables as $tableName)
        {
            DB::table($tableName)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
