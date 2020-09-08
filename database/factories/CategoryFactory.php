<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Category::class, function (Faker $faker) {

    $name = $faker->sentence;
    $slug = Str::slug($name, '-');

    return [
        'parent_id' => 1,
        'name' => $faker->sentence(5),
        'slug' => $slug,
        'published' => rand(0, 1)
    ];
});
