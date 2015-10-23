<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Cmgmyr\Messenger\Traits\Messagable;

class Users extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use Messagable;
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
        $this->attributes['datejoined'] = $date;
    }

    //A user can have many ideas
    public function ideas()
    {
        return $this->hasMany('App\Ideas');
    }

    protected $hidden = ['password', 'remember_token'];

    /**
     * this gets the ideas that the user did not upload
     * @return mixed
     */
    public static function getUnratedIdea()
    {
        $idea = DB::table('ideas')
            ->select('ideas.id', 'ideas.ideaname', 'ideas.idea')
            ->where('ideas.users_id', '!=', Auth::id())
            ->whereNotIn('ideas.id', function ($query) {
                $query->select('likes.idea_id')
                    ->from('likes')
                    ->where('user_id', Auth::id());
            })
            ->get();

        return $idea;
    }


    public static function getMyIdeas(){
        $myIdeas = DB::table('ideas')
            ->select('ideas.id','ideas.ideaname','ideas.idea')
            ->where('ideas.users_id', Auth::id())
            ->paginate(10);
//            ->get();
        return $myIdeas;
    }

    public static function addBio(){
        $aboutme = Input::get('aboutme');
        $user = \Auth::user()->id;
        DB::table('users')
            ->where('id',$user)
            ->update(['aboutme'=> $aboutme]);
    }

}
