<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->word,
        'description' => $faker->text,
    ];
});