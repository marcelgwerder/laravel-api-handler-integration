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
use Marcelgwerder\ApiHandler\Facades\ApiHandler;
use Illuminate\Database\Eloquent\Builder;

Route::get('/posts/{id}', function ($id) {
    return ApiHandler::from(Post::whereKey($id))
            ->expandable('votes')
            ->asResource();
});

Route::get('/posts', function () {
    return ApiHandler::from(Post::class)
           /*  ->registerScope(function(Builder $builder) {
                $builder->whereIn('id', [1, 2, 3]);
            })
            ->registerScope(function(Builder $builder) {
                $builder->whereIn('id', [1,2]);
            }) */
            ->registerFilter('custom', function(Builder $builder) {
                $builder->where('published_from', '2008-06-05 22:59:04');
            })
            ->filterable('*', 'comments.title')
            ->sortable('*')
            ->searchable('title', 'content')
            ->expandable('*', 'comments.post')
            ->asResourceCollection();
             //->asBuilder()->toSql();
});

Route::get('/videos', function () {
    return ApiHandler::from(Video::class)
            ->asResourceCollection();
});
