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
            $table->integer('campus_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('month_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('year_id')->unsigned();
            $table->foreign('campus_id')
                ->references('id')
                ->on('campuses');
            $table->foreign('year_id')
                ->references('id')
                ->on('year_of_intakes');
            $table->foreign('month_id')
                ->references('id')
                ->on('month_of_intakes');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');
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