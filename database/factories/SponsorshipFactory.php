<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Sponsorship;

use Faker\Generator as Faker;

$factory->define(Sponsorship::class, function (Faker $faker) {
    return [
        'start_date' => $faker -> date,
        'end_date'  => '2020/10/31',
        
    ];
});
