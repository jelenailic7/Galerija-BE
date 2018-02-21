<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Requests\GalleryRequest;
use App\User;


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
        return Gallery::create($request->all());
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
    public function getGalleriesUser(Gallery $gallerie)
    {
    	return $user = $gallery->user();
    }

}
