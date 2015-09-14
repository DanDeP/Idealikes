<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Users extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $fillable = [
        'username',
        'password',
        'email',
        'secretq',
        'secreta',
        'profilemsg',
        'aboutme'
    ];

    protected $dates = ['datejoined'];

   public function setDateCreated($date)
    {
        $this->attributes['datejoined']=$date;
    }

    //A user can have many ideas
    public function ideas()
    {
        return $this->hasMany('App\Ideas');
    }

}
