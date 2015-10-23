<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Ideas;
use App\Likes;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommentsController extends Controller
{
    /**
     * This method inserts a comment in the comment table
     * @return mixed
     */
    public function addComments(){
        $comment = Input::get('comments');
        $auth = \Auth::user()->id;
        $idea_id = Input::get('idea_id');
        $ideaContent = Likes::getContent($idea_id);
        Comments::makeComment($auth,$idea_id,$comment);

        $likes = Likes::getLikes();
        $allComments = $this->getComments($idea_id);
        return view('Likes.index',compact('likes','allComments','ideaContent'));
    }

    public function addOwnComments(){
        $comment = Input::get('comments');
        $auth = \Auth::user()->id;
        $idea_id = Input::get('idea_id');
        $ideaContent = Likes::getContent($idea_id);
        Comments::makeComment($auth,$idea_id,$comment);

        $myIdeas = Users::getMyIdeas();
        $allComments = $this->getComments($idea_id);
        return view('myIdeas.index',compact('myIdeas','allComments','ideaContent'));
    }

    /**
     * This method gets all the comments for a particular idea
     * @param $idea_id
     * @return \Illuminate\View\View
     */
    public static function getComments($idea_id){
        $allComments = Comments::getAllComments($idea_id);

        return $allComments;
    }
}
