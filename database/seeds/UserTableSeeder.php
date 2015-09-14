<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'username' => 'dandep07',
        'email'    => 'palms_de@hotmail.com',
        'password' => Hash::make('awesome'),
		'secretq' => 'Where were you born?',
		'secreta' => 'Hamilton',
		'profilemsg' => 'I am the first user of this website',
		'aboutme' => 'I am a real person',
		
    ));
}

}