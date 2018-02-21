<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gallery;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function show($id)
    {
        return $user = User::find($id)->get();
      
    }

    public function getUserGalleries(User $user)   
    {   
    	 $user = Auth::user();	
    	 return $galleries = $user->galleries()->get();
    }

      public function getAuthorGalleries($id)   
    {   
    	// return User::find($id)->join('galleries', 'users.id', '=', 'galleries.user_id')->get();

    	return $galleries = User::find($id)->galleries()->get();

    }
}
