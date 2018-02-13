<?php

use Faker\Generator as Faker;

$factory->define(App\Vote::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['up', 'down']),
        'visitor_ip' => $faker->ipv4,
        'visitor_email' => $faker->email,
        'user_id' => function () use ($faker) {
            return $faker->randomElement([null, factory(App\User::class)->create()->id]);
        }
    ];
});
