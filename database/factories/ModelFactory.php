<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'location'=> $faker->streetAddress,
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'role' => $faker->name,
        'age' => $faker->numberBetween($min = 10, $max = 90),
        'phone_number' => $faker->phoneNumber,
        'sex' => '1',
        'descr' => $faker->sentence,
        'prev_job' => $faker->jobTitle,
        'cover_photo' => $faker->name,
        'tshirt_size' => $faker->randomDigit,
        'height' => $faker->numberBetween($min = 1,05, $max = 2,50),
        'hair' => $faker->colorName,
        'shoes_size' => $faker->randomDigit,
        'eyes' => $faker->colorName,
        'remember_token' => str_random(10),
    ];
});
