<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' =>Str::random(10),
        'name' => 'Sản phẩm' . $faker->numberBetween(100,2000),
        'description' =>Str::random(30),
        'active' => random_int(0,1),
        'category_id' => $faker->numberBetween($min=1, $max=3)





    ];
});
