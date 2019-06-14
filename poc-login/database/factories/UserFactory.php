<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
 * Model factory for faker database
 * @author hoang.pt
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$04$PKAmr8YRyu1gEwqB.hbdz.qORhUZnLV73PydQNZqdJuuL5cPpjAvi', // password
        'remember_token' => Str::random(10),
    ];
});
