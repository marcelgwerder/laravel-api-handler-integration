<?php

$factory->define(App\PostExtended::class, function () {
    return [
        'facebook_shares' => rand(0, 500),
        'twitter_shares' => rand(0, 100),
    ];
});
