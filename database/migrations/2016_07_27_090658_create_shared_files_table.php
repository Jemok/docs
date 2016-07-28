<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('share_type')->unsigned();
            $table->integer('file_id')->index()->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('file_id')
                  ->references('id')
                  ->on('files');

            $table->integer('receiver')->index()->unsigned();


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
        Schema::drop('shared_files');
    }
}
