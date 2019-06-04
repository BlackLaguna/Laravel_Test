<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $companie = App\Companie::all()->pluck('id')->toArray();
    $post = App\Post::all()->pluck('id')->toArray();
    return [
        'company_id' => $faker->randomElement($companie),
        'post' => $faker->randomElement($post),
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
    ];
});
