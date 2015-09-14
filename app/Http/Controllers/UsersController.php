<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Users;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::latest()->get();
        return view('users.index')->with('users',$users);
    }

    public function show($id)
    {
        $user = Users::findorfail ($id);

        return view('users.show')->with('users',$user);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $new_user = Users::create($input);
        $currentDate = Carbon::now();
        $new_user->setDateCreated($currentDate);
        $new_user->save();
        return redirect('users');
    }
}
