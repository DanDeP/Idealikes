<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Likes extends Model
{
    protected $fillable = [
        'user_id',
        'idea_id',
        'is_liked',
        'is_disliked'
    ];
    public function setDateCreated($date)
    {
        $this->attributes['dateuploaded']=$date;
    }
    /**
     * This will insert a record into the likes table
     */
    public static function isRated($idea_id,$user_id,$rate){
        //var $is_liked = $rate;
        if($rate == 'Like'){
            $is_liked = 'is_liked';
        }else{
            $is_liked = 'is_disliked';
        }

        $isRated = DB::table('likes')
            ->insert(
                array('user_id' => $user_id,
                      'idea_id' => $idea_id,
                      $is_liked => 1)
            );
    }
}
