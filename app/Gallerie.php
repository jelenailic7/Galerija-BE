<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallerie extends Model
{

     protected $fillable = [
        'name','description', 'image_url', 'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    protected $casts = [
        'image_url' => 'array'
    ];
}
