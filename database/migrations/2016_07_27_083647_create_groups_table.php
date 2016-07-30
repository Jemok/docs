<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campus_id')->index()->unsigned();
            $table->integer('month_of_intake_id')->index()->unsigned();
            $table->integer('course_id')->index()->unsigned();
            $table->integer('year_of_intake_id')->index()->unsigned();
            $table->integer('class_division_id')->index()->unsigned();
            $table->foreign('campus_id')
                ->references('id')
                ->on('campuses');
            $table->foreign('year_of_intake_id')
                ->references('id')
                ->on('year_of_intakes');
            $table->foreign('month_of_intake_id')
                ->references('id')
                ->on('month_of_intakes');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');

            DB::statement('SET FOREIGN_KEY_CHECKS = 0');

            $table->foreign('class_division_id')
                  ->references('id')
                  ->on('class_divisions');
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
    }
}
