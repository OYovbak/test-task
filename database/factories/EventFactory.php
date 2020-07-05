<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'title'=> $faker->word,
        'city' => $faker->city,
        'date' => $faker->date($format = 'Y-m-d')
    ];
});
