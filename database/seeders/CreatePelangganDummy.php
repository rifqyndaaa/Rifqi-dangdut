<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePelangganDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
<<<<<<< HEAD
    public function run(){
        $faker = \Faker\Factory::create();

        foreach (range(1, 1000) as $index) {
            DB::table('pelanggan')->insert([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'birthday'   => $faker->date('Y-m-d', '2005-12-31'),
                'gender'     => $faker->randomElement(['Male', 'Female', 'Other']),
                'email'      => $faker->unique()->safeEmail,
                'phone'      => $faker->phoneNumber,
            ]);
        }
    }
}
=======
    public function run(): void
    {
    $faker = \Faker\Factory::create();

    foreach (range(1, 100) as $index) {
        DB::table('pelanggan')->insert([
            'first_name' => $faker->firstName,
            'last_name'  => $faker->lastName,
            'birthday'   => $faker->date('Y-m-d', '2005-12-31'),
            'gender'     => $faker->randomElement(['Male', 'Female', 'Other']),
            'email'      => $faker->unique()->safeEmail,
            'phone'      => $faker->phoneNumber,
        ]);
    }
}
    }

>>>>>>> be6cabad91de1508e88db3ee31484b03523d920c
