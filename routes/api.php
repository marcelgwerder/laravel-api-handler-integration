<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use App\Post;
use App\Video;
use Marcelgwerder\ApiHandler\ApiHandler;

Route::get('/posts/{id}', function ($id) {
    return ApiHandler::from(Post::whereKey($id))
            ->expandable('comments')
            ->asResource();
});

Route::get('/posts', function () {
    return ApiHandler::from(Post::class)
            ->expandable('comments')
            ->asResourceCollection();
});

Route::get('/videos', function () {
    return ApiHandler::from(Video::class)
            ->expandable('comments')
            ->applyScope(function())
            ->asResourceCollection();
});
