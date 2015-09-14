<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('username', 32)->unique();
			$table->string('email', 100);
			$table->string('password', 64);
			$table->string('secretq', 320);
			$table->string('secreta', 64);
			$table->string('rank', 32);
			$table->string('profilemsg', 320);
			$table->string('aboutme', 500);
			$table->date('datejoined');
			$table->string('frozen', 1);
			$table->rememberToken();
            $table->timestamps();						
        });

		/*Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('sender_id')->unsigned();
			$table->foreign('sender_id')->references('id')->on('users');
			$table->integer('receiver_id')->unsigned();
			$table->foreign('receiver_id')->references('id')->on('users');
			$table->string('subject', 320);
			$table->string('body', 750);
			$table->dateTime('timesent');
            $table->timestamps();						
        });
		
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
		
		Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('ideaname', 64);
			$table->string('idea', 1000);
			$table->date('dateuploaded');
            $table->timestamps();						
        });
		
		Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('liked_idea')->unsigned();
			$table->foreign('liked_idea')->references('id')->on('ideas');
			$table->date('dateuploaded');
            $table->timestamps();						
        });
		
		Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('commented_idea')->unsigned();
			$table->foreign('commented_idea')->references('id')->on('ideas');
			$table->string('comment', 750);
			$table->date('dateuploaded');
            $table->timestamps();						
        });*/
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
		Schema::drop('messages');
		Schema::drop('warning');
		Schema::drop('ideas');
		Schema::drop('likes');
		Schema::drop('comments');
    }
}
