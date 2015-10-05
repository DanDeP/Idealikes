<?php

namespace App\Http\Controllers;

use App\Ideas;
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

        return view('Ideas.index')->with('unratedIdeas',$unratedIdeas);
    }

    /**
     *
     * @param Ideas $idea
     * @return string
     */
    public function rated(Ideas $idea)
    {
        //get the idea id and add to like table
        //add the user id to the like table
        //add one to like or dislike depending on which submit button was clicked
        //return view (same as index method in this controlle   r)

        //Finds whether 'Like' or 'Dislike' was chosen
        $action = Input::get('action','none');
        //Gets userid
        $auth = \Auth::user()->id;
        $input = Input::get('idea_id');
        if($action == 'Like'){

            return 'hello '.$input;
        }else{ //it's disliked

            return 'nottest';
        }

    }
}
