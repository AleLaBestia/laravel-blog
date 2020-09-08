<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Post::class, function (Faker $faker) {
    return [

        'title' => $faker->sentence,
        'body'  => $faker->paragraph,
        'slug'  => Str::slug($faker->sentence),
        'user_id' => App\User::all()->random()->id,        
        'image' => asset('imagenes/posts/'.$faker->image('public/imagenes/posts',640,480, null, false)),

    ];
});