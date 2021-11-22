<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectionType;
use Faker\Generator as Faker;

class SectionTypeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = \Faker\Factory::create();

        $sectionTypes = [
            'Sign up' => [
                'status' => true,
            ],
            'Payments' => [
                'status' => true,
            ],
            'Checkout' => [
                'status' => false
            ]
        ];

        foreach ($sectionTypes as $name => $sectionType) {

            SectionType::create([
                'sec_type_name' => $name,
                'status' => $sectionType['status'],
                'description' => $faker->paragraph
            ]);
        }
    }

}
