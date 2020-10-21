<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Property_img;
use Faker\Generator as Faker;

$factory->define(Property_img::class, function (Faker $faker) {
    return [
        'deleted' => 0,
        'img' => 'property.jpg',
    ];
});
