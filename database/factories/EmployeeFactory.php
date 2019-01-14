<?php

use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

$factory->define(App\Employee::class, function (Faker $faker) {
    $faker = FakerFactory::create('uk_UA');
    $positionIds=App\Position::all()->pluck('id')->toArray();
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'name'=>$faker->firstName($gender),
        'surname'=>$faker->lastName($gender),
        'patronymic'=>$faker->middleName($gender),
        // 'position_id' => $faker->randomElement($positionIds),
        'position_id' =>NULL,
        'hire_date'=>$faker->date($format = 'Y-m-d',$max='2010-01-01'),
        'salary'=>$faker->randomFloat($nbMaxDecimals = NULL,$min = 1000, $max = 10000),
        'parent_id' => NULL,
    ];
});
