<?php

/**
 * Creates a table that stores the status of a user school registration
 * status
 *
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSchoolDetailTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_school_details', function (Blueprint $table) {
            $table->increments('id');
            /**
             * If status is 0, student has no class
             * If status is 1, student has a class
             */
            $table->integer('status')->unsigned()->default(0);

            /**
             * The foreign key of the users table
             */
            $table->integer('user_id')->index()->unsigned();
            $table->timestamps();

            $table->integer('notify')->unsigned()->default(1);

            /**
             * The foreign key definition for the users table
             */
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_school_details');
    }
}
