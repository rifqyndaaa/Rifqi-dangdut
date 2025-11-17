<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======

>>>>>>> be6cabad91de1508e88db3ee31484b03523d920c
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
       $data['name'] = 'rifqi';
        $data['email'] = 'Rifqi@gmail.com';
        $data['password'] = Hash::make('password123');
        User::create($data);
    }


=======
  User::create([
    'name' => 'Gatot Kaca',
    'email' => 'gatot@pcr.ac.id',
    'password' => Hash::make('gatotkaca123')
]);



    }
>>>>>>> be6cabad91de1508e88db3ee31484b03523d920c
}
