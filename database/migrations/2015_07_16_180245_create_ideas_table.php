<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     	Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('users_id')->unsigned();
			$table->foreign('users_id')->references('id')->on('users');
			$table->string('ideaname', 64);
			$table->string('idea', 1000);
			$table->date('dateuploaded');
            $table->timestamps();

            $table->foreign('users_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
