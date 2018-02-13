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



### Many to Many Polymorphic

