<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Property_views;

use Faker\Generator as Faker;

$factory->define(Property_views::class, function (Faker $faker) {
    return [
        'date' => $faker -> date
    ];
});
