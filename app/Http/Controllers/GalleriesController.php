<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallerie;
use App\Requests\GallerieRequest;

class GalleriesController extends Controller
{
    
    public function index()
    {
        // $term = request()->input('term');
  
        // if($term) {
          
        //     return Gallerie::search($term);
        // } else {
            return Gallerie::all();
        // }
    }
   
   
    public function store(GallerieRequest $request)
    {
        return Gallerie::create($request->all());
    }
  
    public function show($id)
    {
        return Gallerie::find($id);
    }
   
    public function edit($id)
    {
        //
    }

    public function update(GallerieRequest $request, $id)
    {
        $gallerie = Gallerie::findOrFail($id);
        $gallerie->update($request->all());
        return $gallerie;
    }
   
    
    public function destroy($id)
    {
        $gallerie = Gallerie::find($id);
        $gallerie->delete();
    }
}
