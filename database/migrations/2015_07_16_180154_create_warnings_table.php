<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('warning', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('sender_id')->unsigned();
			$table->foreign('sender_id')->references('id')->on('users');
			$table->integer('receiver_id')->unsigned();
			$table->foreign('receiver_id')->references('id')->on('users');
			$table->string('warningmessage', 750);
			$table->dateTime('timesent');
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
        //
    }
}
