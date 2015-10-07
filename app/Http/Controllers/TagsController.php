<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $unratedIdeas = Users::getUnratedIdea();
        $ideas = $tag->ideas;
        return view('Ideas.index', compact('ideas','unratedIdeas'));
    }
}
