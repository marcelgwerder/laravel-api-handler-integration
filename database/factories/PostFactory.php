<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $publishedFrom = $faker->randomElement([Carbon::instance($faker->dateTime()), null]);
    $title = $faker->unique()->sentence;

    return [
        'published_from' => $publishedFrom,
        'published_until' => $publishedFrom ? $faker->randomElement([$publishedFrom->copy()->addDays(rand(2, 100)), null]) : null,
        'slug' => str_slug($title, '-'),
        'title' => $title,
        'teaser' => $faker->text(rand(100, 200)),
        'teaser_image' => $faker->imageUrl,
        'content' => $faker->text(rand(300, 600)),
        'user_id' => function () use($faker) {
            $user = App\User::orderByRaw('RAND()')->first();

            if ($faker->boolean(10) || !$user) {
                $user = factory(App\User::class)->create();
            }

            return $user->id;
        },
    ];
});
