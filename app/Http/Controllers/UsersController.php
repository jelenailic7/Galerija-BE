<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gallery;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id)->with('galleries');
      
    }
    public function getUserGalleries(User $user)
    {
    	 return $galleries = $user->galleries()->get();
    }
}
