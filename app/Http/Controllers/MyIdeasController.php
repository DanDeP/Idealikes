<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Ideas;
use App\Likes;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyIdeasController extends Controller
{
    public function index(){
        $myIdeas = Users::getMyIdeas();
            return view('myIdeas.index',compact('myIdeas'));
    }

    public function ideaContent($idea){
        $myIdeas = Users::getMyIdeas();
        $ideaContent = Likes::getContent($idea);
        $allComments = Comments::getAllComments($idea);
        $ideaView = Likes::getIdeaViews($idea);
        $allTimeLikes = Likes::getAllLikes($idea);

        return view('myIdeas.index',compact('myIdeas','ideaContent','allComments','ideaView','allTimeLikes'));
    }

    public function delete($idea){
            Ideas::deleteIdea($idea);
            $myIdeas = Users::getMyIdeas();
        return redirect('myIdeas');
        //return view('myIdeas.index',compact('myIdeas'));
    }
}
