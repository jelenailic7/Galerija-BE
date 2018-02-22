<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
		
    		return [
	            'text' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
			 	'user_id' => App\User::all()->random()->id,
			 	'gallery_id' => App\Gallery::all()->random()->id,
                     
    ];
});
