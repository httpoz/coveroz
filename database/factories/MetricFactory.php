<?php

use Faker\Generator as Faker;

$factory->define(App\Metric::class, function (Faker $faker) {
    return [
        'commit' => random_int(0, 100),
        'files' => random_int(0, 100),
        'loc' => random_int(0, 100),
        'ncloc' => random_int(0, 100),
        'classes' => random_int(0, 100),
        'methods' => random_int(0, 100),
        'coveredmethods' => random_int(0, 100),
        'conditionals' => random_int(0, 100),
        'coveredconditionals' => random_int(0, 100),
        'statements' => random_int(0, 100),
        'coveredstatements' => random_int(0, 100),
        'elements' => random_int(0, 100),
        'coveredelements' => random_int(0, 100),
        'project_id' => function () {
            return factory(\App\Project::class)->create()->id;
        }
    ];
});
