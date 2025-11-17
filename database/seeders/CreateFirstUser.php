<?php

namespace Database\Seeders;

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
       $data['name'] = 'rifqi';
        $data['email'] = 'Rifqi@gmail.com';
        $data['password'] = Hash::make('password123');
        User::create($data);
    }


}
