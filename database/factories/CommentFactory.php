<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'message' => $faker->text(rand(30, 100)),
        'visitor_ip' => $faker->ipv4,
        'visitor_email' => $faker->email,
        'user_id' => function () use ($faker) {
            $user = App\User::orderByRaw('RAND()')->first();

            if ($faker->boolean(10) || !$user) {
                $user = factory(App\User::class)->create();
            }

            return $faker->randomElement([null, $user->id]);
        },
    ];
});
