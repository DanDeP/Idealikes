<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Users;
use Carbon\Carbon;
use App\Ideas;
//use App\Http\Requests\Request;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class IdeasController extends Controller
{
//when IdeasController is run, there will be an auth check when the create method is called
//'auth' is referring to the 'auth' value in the middleware authenticate class
//instead of only, you could use except as well
//you could add this in the routes instead of as a constructor (laracast orgres are like middleware)
    public function __construct()
    {
        $this->middleware('auth',['only'=>'create']);

    }

    public function index()
    {
//      $ideas = Ideas::latest()->get();
        $unratedIdeas = Users::getUnratedIdea();

        return Redirect::to('rate');
        //return view('Ideas.index')->with('unratedIdeas',$unratedIdeas);
    }

    /**
     * Not used. shows the idea in a different page
     * @param Ideas $idea
     * @return $this
     */
    public function show(Ideas $idea)
    {
        return view('Ideas.show')->with('ideas',$idea);
    }

    /**
     * create function is to upload a new idea using a form
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::orderby('name')->lists('name', 'id'); //gives all items from the column 'name'

        return view('Ideas.create', compact('tags'));
    }

    /**
     * This saves a new idea in the database. Helper function of the create method
     * @param IdeaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(IdeaRequest $request)
    {

        $new_idea = new Ideas($request->all());
        $currentDate = Carbon::now();
        $new_idea->setDateCreated($currentDate);
        //grabs users ideas, and saves a new one
        $idea = \Auth::user()->ideas()->save($new_idea);

        //$tagIds = $request->input('tag_list');

        $this->syncTags($idea, $request->input('tag_list'));
        //$idea->tags()->attach($tagIds);

        //\Session::flash('flash_message','Your idea has been submitted!');//could do these or, what it shows in the return
        //\Session::flash('flash_message_important',true);

        return redirect('myIdeas')->with([ //with assumes flash message
            'flash_message'=>'Your idea has been submitted!',
            //  'flash_message_important'=> true
        ]);

    }

    /**
     * Edit function is called to edit idea in a form
     * @param Ideas $idea
     * @return \Illuminate\View\View
     */
    public function edit(Ideas $idea)
    {
        $tags = Tag::orderby('name')->lists('name', 'id'); //gives all items from the column 'name'

        //compact passes $idea to the view
        return view('Ideas.edit', compact('idea', 'tags'));
    }

    /**
     * Updates the database from an edit
     * @param Ideas $idea
     * @param IdeaRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Ideas $idea, IdeaRequest $request)
    {
        $idea->update($request->all());

        $this->syncTags($idea, $request->input('tag_list'));

        return redirect('myIdeas');
    }

    /**
     * Sync of list of tags in the database
     *
     * @param Ideas $idea
     * @param array $tags
     *
     */
    private function syncTags(Ideas $idea, array $tags)
    {
        $idea->tags()->sync($tags);
    }
}
