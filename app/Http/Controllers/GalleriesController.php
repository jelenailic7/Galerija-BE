<?php

namespace App\Http\Controllers;
use App\Gallery;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\Auth;



class GalleriesController extends Controller
{
    
    public function index()
    {

         $term = request()->input('term');
  
         if($term) {
          
             return Gallery::search($term);

         } else {

         	return Gallery::with(['user'])->orderBy('created_at', 'desc')->get();
         }
    }
   
   
    public function store(GalleryRequest $request)
    {
    	$gallery = new Gallery();
    	$gallery->name = $request['name'];
    	$gallery->description= $request['description'];
    	$gallery->image_url = [ $request['image_url'] ];
    	$gallery->user_id = Auth::user()->id;	
    	$gallery->save();
    }
  
    public function show($id)
    {
       // return $gallery = Gallery::with(['user'])->where('id', $id);
        // $gallery->with(['comments'], function($q) {
        //     $q->join('comments', 'comments.user_id', '=', 'users.id');
        // });

        // return $gallery->with(['comments'=> function( $q ) {
        //     $q->with('user');
        //     } ]
        // )->first();
        return Gallery::with('user')->find($id);

    }
   
    public function edit($id)
    {
        //
    }

    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        return $gallery;
    }
   
    
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
    }
    public function getGalleryComments($id)
    {

        return $comments = Gallery::find($id)->comments()->with(['user'])->get();
    }

}
