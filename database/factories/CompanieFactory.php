<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Companie;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;


$factory->define(Companie::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'password' => Hash::make('TestPass'),
    ];
});
