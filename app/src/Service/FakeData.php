<?php

namespace App\Service;

use Faker;

class FakeData
{
    public function generateData(int $dataAmount = 20): array
    {
        $faker = Faker\Factory::create();
        $output = [];

        for ($i = 0; $i < $dataAmount; $i++) {
            $output[] = [
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'address' => $faker->address
            ];
        }

        return $output;
    }
}