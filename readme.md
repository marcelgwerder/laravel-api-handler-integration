# Laravel Api Handler Integration

This project provides the basic Laravel and database setup needed to develop and test the Laravel Api Handler. It also serves as an extended source of examples.

**CURRENTLY IN DEVELOPMENT ALONG WITH API HANDLER V1.0**

- [Api](#api)
- [Relationships](#relationships)

## Api

[GET] /api/posts 

[GET] /api/posts/{id}




## Relationships

Below are all the Laravel relationships and how they are covered by this integration project.

### One to One

📖 [Laravel Docs](https://laravel.com/docs/master/eloquent-relationships#one-to-one)

**Post::post_extended()**

```
posts
    id - integer
    ...

post_extended
    post_id - integer
    ...
```

### One to Many

📖 [Laravel Docs](https://laravel.com/docs/master/eloquent-relationships#one-to-many)

**Post::votes()**
```
posts
    id - integer
    ...

votes
    ...
    post_id - integer
```

### One to Many (Inverse)

📖 [Laravel Docs](https://laravel.com/docs/master/eloquent-relationships#one-to-many-inverse)

**Vote::post()**

```
votes
    ...
    post_id - integer

posts
    id - integer
    ...
```


### Many to Many

📖 [Laravel Docs](https://laravel.com/docs/master/eloquent-relationships#many-to-many)

**Post::tags()**

```
post
    id - integer
    ...

post_tag
    post_id - integer
    tag_id - string

tags
    id - string
    ...
```

### Has Many Through

📖 [Laravel Docs](https://laravel.com/docs/master/eloquent-relationships#has-many-through)

**Country::posts()**

```
countries
    id - integer
    ...

users
    id - integer
    ...
    country_id - integer

posts
    ...
    user_id - integer
```

### Polymorphic

📖 [Laravel Docs](https://laravel.com/docs/master/eloquent-relationships#polymorphic-relations)

**Post::comments()** or **Video::comments()**

```
posts
    id - integer
    ...

videos
    id - integer
    ...

comments
    ...
    commentable_id - integer
    commentable_type - string
```

### Many to Many Polymorphic

📖 [Laravel Docs](https://laravel.com/docs/master/eloquent-relationships#many-to-many-polymorphic-relations)

**Post::tagsPoly()** or **Video::tagsPoly()**
```
posts
    id - integer
    ...

videos
    id - integer
    ...

tags
    id - string
    ...

taggables
    tag_id - string
    taggable_id - integer
    taggable_type - string
```