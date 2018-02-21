<?php

use Faker\Generator as Faker;

$factory->define(App\Gallery::class, function (Faker $faker) {
		$values = array();
			for ($i=0; $i < 100; $i++) {
				$values []= $faker->unique()->imageUrl($width = 200, $height =200);
				 }

    		return [
	            'name' => $faker->words($nb = 4, $asText = true),
	            'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
	            'image_url'=>array_random($values, 4),
			 	'user_id' => App\User::all()->random()->id,
                     
    ];
});
