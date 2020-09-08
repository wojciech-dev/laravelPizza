<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Post::class, function (Faker $faker) {

    $title = $faker->sentence;
    $slug = Str::slug($title, '-');

    return [
        'parent_id' => 1,
        'name' => $faker->sentence(5),
        'title' => $faker->sentence(5),
        'slug' => $slug,
        'content' => $faker->paragraph(5),
        'published' => rand(0, 1),
        'premium' => rand(0, 1),
        'image' => $faker->imageUrl(640, 480)
    ];
});
