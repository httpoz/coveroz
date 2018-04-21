<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'hook_id' => function () {
            return factory(\HttpOz\Hook\Models\Hook::class)->create()->id;
        },
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        }
    ];
});
