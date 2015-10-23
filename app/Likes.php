<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    public static function getLikes(){
        $myLikes = DB::table('ideas')
            ->select('ideas.id','ideas.ideaname','ideas.idea')
            ->whereIn('ideas.id', function($query) {
                $query->select('likes.idea_id')
                    ->from('likes')
                    ->where('user_id', Auth::id())
                    ->where('is_liked','!=','0');
            })
            ->paginate(10);

        return $myLikes;
    }

    /**
     * This method finds the idea with the particular like id
     * @param $idea
     * @return idea id
     */
    public static function getContent($idea){
        return Ideas::find($idea);
    }

    /**
     * returns the number of views by counting how many times it appears in the likes table
     * @param $idea (idea_id)
     * @return mixed
     */
    public static function getIdeaViews($idea){
            $views = DB::table('likes')->where('idea_id', $idea)->count();
        return $views;
    }

    /**
     * gets all ideas that the user has liked
     * @param $idea (idea_id)
     * @return mixed
     */
    public static function getAllLikes($idea){
        $allLikes = DB::table('likes')
            ->where('idea_id', $idea)
            ->where('is_disliked', '==', '0')
            ->count();
        return $allLikes;
    }

    public static function unlike($idea){
        DB::table('likes')
            ->where('idea_id',$idea)
            ->update(['is_liked'=>0,'is_disliked'=>1]);
    }
}
