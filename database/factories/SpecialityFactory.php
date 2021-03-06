<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Speciality;
use App\Branch;
use App\Service;
use Faker\Generator as Faker;

$factory->define(Speciality::class, function (Faker $faker) {
    $branchoffice = Branch::inRandomOrder()->first();
    $service = Service::inRandomOrder()->first();

    return [
        'name'        => $faker->randomElement(['Otorrinolaringología', 'Cirugía Plastica', 'Cirugía Maxilofacial', 'Oftamología', 'Ginecología', 'Odontología', 'Nefrología', 'Epidemiología', 'Lipidología', 'Geriatria']),
        'description' => $faker->sentence,
        'service_id' => $service->id,
        'branch_id' => $branchoffice->id,
    ];
});
