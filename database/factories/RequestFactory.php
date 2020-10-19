<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Request;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker) {
    return [
        'user_email' => $faker -> email,
        'firstname'  => $faker -> firstname,
        'lastname'  => $faker -> lastname,
        'number'  => $faker -> phoneNumber,
        'text'  => $faker -> realText,
    ];
});
