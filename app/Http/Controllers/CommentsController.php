<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gallery;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{

    public function show($id)
    {
        return Comment::with('user')->find($id)->get();
    }
    public function store(Request $request,$id)
    {

        $request->validate(
        ['text'=>'required|max:1000']);

        $comment = new Comment();
        $comment->text = $request['text'];
        $comment->gallery_id = $id;
        $comment->user_id = Auth()->user()->id;
        $comment->save();

        return back ();

    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }

    public function getUserFromComment()
    {
        return $user = Comment::find($id)->user()->get();
    }
  
}