<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyProfileController extends Controller
{
    public function index(){

        return view('Profile.index');
    }

    public function addBio(){
            Users::addBio();
        return redirect('profile');
    }

    public function edit(){
        return view('Profile.edit');
    }

    public function viewProfile($userid){
        $user = Users::find($userid);

       return view('Profile.index',compact('user'));
    }
}
