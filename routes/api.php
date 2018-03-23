<?php

use App\Post;

Route::get('/', function () {
    return view('swagger');
});

Route::get('/posts/{id}', function ($id) {
    return ApiHandler::from(Post::whereKey($id))
        ->asResource();
});

Route::get('/restricted-posts/{id}', function ($id) {
    return ApiHandler::from(Post::whereKey($id))
        ->expandable('votes')
        ->selectable('title')
        ->asResource();
});

Route::get('/posts', function () {
    return ApiHandler::from(Post::class)
        ->searchable('title', 'content')
        ->asResourceCollection();
});

Route::get('/restricted-posts', function () {
    return ApiHandler::from(Post::class)
        ->expandable('votes')
        ->selectable('title')
        ->filterable('id')
        ->sortable('id')
        ->searchable('title', 'content')
        ->asResourceCollection();
});
