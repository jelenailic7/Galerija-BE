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

            return Gallery::with('user')->get();
         }
    }
   
   
    public function store(GalleryRequest $request)
    {
    	$gallery = new Gallery();
    	$gallery->name = $request['name'];
    	$gallery->description= $request['description'];
    	$gallery->image_url = $request['image_url'];
    	$gallery->user_id = Auth::user()->id;	
    	$gallery->save();
    }
  
    public function show($id)
    {
        return Gallery::find($id);
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
    

}
