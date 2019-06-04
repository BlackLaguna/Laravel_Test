<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Coment;
use Faker\Generator as Faker;

$factory->define(Coment::class, function (Faker $faker) {
    $companieId = App\Companie::all()->pluck('id')->toArray();
    $companieName = App\Companie::all()->pluck('name')->toArray();

    return [
       'body' => $faker->realText(90),
        'owner' => $faker->randomElement($companieName),
        'company_id' => $faker->randomElement($companieId),
    ];
});
