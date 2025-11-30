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
    public function run()
    {
        // Menggunakan regional 'id_ID' untuk data Indonesia
        $faker = \Faker\Factory::create('id_ID');

        foreach (range(1, 100) as $index) {
            DB::table('pelanggan')->insert([
                // Menggunakan name() untuk nama lengkap Indonesia
                'first_name' => $faker->firstName, // Gunakan firstName jika kolom memang memisahkannya
                'last_name'  => $faker->lastName,  // Gunakan lastName jika kolom memang memisahkannya
                // Jika ingin nama lengkap di satu kolom, bisa gunakan:
                // 'nama_lengkap' => $faker->name,

                'birthday'   => $faker->date('Y-m-d', '2005-12-31'),

                // Gender: Male/Female dalam Bahasa Inggris (sesuai kebutuhan database)
                // atau 'Laki-laki' / 'Perempuan' jika database menggunakan B. Indonesia
                'gender'     => $faker->randomElement(['Male', 'Female']), // Umumnya di DB pakai Male/Female

                'email'      => $faker->unique()->safeEmail,

                // Menggunakan phoneNumber regional Indonesia
                'phone'      => $faker->phoneNumber,
                // Untuk memastikan nomor diawali 08, bisa modifikasi seperti:
                // 'phone'      => '08' . $faker->numberBetween(1000000000, 9999999999),
            ]);
        }
    }
}
