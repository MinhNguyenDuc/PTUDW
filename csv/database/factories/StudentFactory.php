<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'studentID' => $faker->unique()->numberBetween($min = 1000, $max = 90000),
        'name' => $faker->name,
        'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $faker->numberBetween($min=0, $max = 1),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'avatar' => $faker->imageUrl($width = 640, $height = 480),
        'province' => $faker->numberBetween($min = 1, $max = 96),
        'district' => $faker->numberBetween($min = 1, $max = 973),
        'academic_yearID' => $faker->numberBetween($min=40, $max=63)
    ];
});
