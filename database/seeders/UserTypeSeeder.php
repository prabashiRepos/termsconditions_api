<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserType;
use Faker\Generator as Faker;

class UserTypeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //UserType::factory()->count(2)->create();
        $faker = \Faker\Factory::create();

        $userTypes = [
            'School' => [
                'status' => true,
            ],
            'Parent' => [
                'status' => true,
            ],
            'Staff' => [
                'status' => false
            ]
        ];

        foreach ($userTypes as $name => $userType) {

            UserType::create([
                'user_type_name' => $name,
                'status' => $userType['status'],
                'description' => $faker->paragraph
            ]);
        }
    }

}
