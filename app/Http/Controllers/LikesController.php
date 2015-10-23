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
use Illuminate\Support\Facades\Redirect;

class LikesController extends Controller
{
    public function index()
    {
//      $ideas = Ideas::latest()->get();
        $unratedIdeas = Users::getUnratedIdea();

        if(empty($unratedIdeas)){
            return view('Ideas.no_more_ideas');
        }else{
            return view('Ideas.index')->with('unratedIdeas',$unratedIdeas);
        }

    }

    /**
     * This function determines whether the user clicks like or dislike.
     * It then calls a function in the likes model which inserts a record
     * into the likes table
     * @param Ideas $idea
     * @return string
     */
    public function rated(Ideas $idea)
    {
        //Finds whether 'Like' or 'Dislike' was chosen
        $action = Input::get('action','none');
        //Gets userid
        $auth = \Auth::user()->id;
        $input = Input::get('idea_id');

        Likes::isRated($input,$auth,$action);

        $unratedIdeas = Users::getUnratedIdea();

        if(empty($unratedIdeas)){
            return view('Ideas.no_more_ideas');
        }else {
            return view('Ideas.index')->with('unratedIdeas', $unratedIdeas);
        }

    }

    /**
     * This method gets all the ideas you liked and displays them in
     * a list in the left panel of the likes page
     * @return \Illuminate\View\View
     */
    public function myLikes(){

        $likes = Likes::getLikes();
        return view('Likes.index',compact('likes'));
    }

    /**
     * This method gets all the ideas you liked, and shows the content
     * of the idea if one of them is clicked.
     * @param $idea (idea_id)
     * @return \Illuminate\View\View
     */
    public function likeContent($idea){
        $likes = Likes::getLikes();
        $ideaContent = Likes::getContent($idea);
        $allComments = Comments::getAllComments($idea);
        $ideaView = Likes::getIdeaViews($idea);
        $allTimeLikes = Likes::getAllLikes($idea);
        return view('Likes.index',compact('likes','ideaContent','allComments','ideaView','allTimeLikes'));
    }

    public function unlike($idea){
            Likes::unlike($idea);
        return redirect('/likes');
    }
}
