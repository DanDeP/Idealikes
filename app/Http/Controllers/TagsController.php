<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {

        $ideas = $tag->ideas;
        return view('Ideas.index', compact('ideas'));
    }
}
