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
        'location'=> $faker->name
            // $table->string('photo')->nullable();
            // $table->string('role')->nullable();
            // $table->integer('age')->nullable();
            // $table->string('phone_number')->nullable();
            // $table->boolean('sex')->nullable();
            // $table->string('descr')->nullable();
            // $table->string('prev_job')->nullable();
            // $table->string('cover_photo')->nullable();
            // $table->string('tshirt_size')->nullable();
            // $table->string('height')->nullable();
            // $table->string('hair')->nullable();
            // $table->string('shoes_size')->nullable();
            // $table->string('eyes')->nullable();
            // $table->string('password');
        'remember_token' => str_random(10),
    ];
});
