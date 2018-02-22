<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table = 'galleries';

     protected $fillable = [
        'name','description', 'image_url',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    protected $casts = [
        'image_url' => 'array'
    ];

    public static function search($term)
    {

        return self::with('user')->where('name','LIKE','%' .$term.'%')
     	   ->whereOr('description','LIKE','%' .$term.'%')
     	   ->orWhereHas('user', function ($query) use ($term) {
     	  	 	return $query->where('first_name', 'LIKE', '%' . $term . '%');
     	 		  })
     	 		 ->get();
     	  
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment','gallery_id');
    }
}

