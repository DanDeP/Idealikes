<?php

namespace App\Http\Controllers;

use App\Ideas;
use App\Likes;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

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
}
