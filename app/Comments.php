<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comments extends Model
{
    public static function makeComment($user_id,$idea_id,$comment){
        DB::table('comments')
            ->insert(
                array('user_id' => $user_id,
                    'commented_idea_id' => $idea_id,
                    'comment' => $comment)
            );
    }

    public static function getAllComments($idea_id){
        $allComments = DB::table('comments')
            ->join('users', 'comments.user_id', '=','users.id')
            ->select('commented_idea_id','comment','user_id','users.username')
            ->where('commented_idea_id','=',$idea_id )
            //->get();
            ->paginate(5);
        return $allComments;
    }
}
