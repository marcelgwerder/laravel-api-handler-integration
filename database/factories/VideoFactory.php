<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    $publishedFrom = $faker->randomElement([Carbon::instance($faker->dateTime()), null]);
    $title = $faker->unique()->sentence;

    return [
        'published_from' => $publishedFrom,
        'published_until' => $publishedFrom ? $faker->randomElement([$publishedFrom->copy()->addDays(rand(2, 100)), null]) : null,
        'slug' => str_slug($title, '-'),
        'title' => $title,
        'file' => $faker->url,
        'user_id' => function () use($faker) {
            $user = App\User::orderByRaw('RAND()')->first();

            if ($faker->boolean(10) || !$user) {
                $user = factory(App\User::class)->create();
            }

            return $user->id;
        },
    ];
});
