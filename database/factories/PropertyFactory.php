<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => $faker -> word,
        'state' => $faker -> state,
        'city' => $faker -> city,
        'address' => $faker -> streetAddress,
        'lat' => $faker -> latitude, 
        'lng' => $faker -> longitude, 
        'm2' => $faker -> numberBetween($min = 30, $max = 200),
        'floors' => $faker -> numberBetween($min = 1, $max = 3),
        'beds' => $faker -> numberBetween($min = 2, $max = 10),
        'bathrooms' => $faker -> numberBetween($min = 1, $max = 5),
        'available' => 1,
        'description' => $faker -> realText,
        'deleted' => 1,
        
    ];
});
