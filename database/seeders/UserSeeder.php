<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->getUsers() as $userData)
        {
            User::updateOrCreate([
                'name' => $userData['name'],   
                'email' => $userData['email'],   
                'role' => $userData['role'],   
                'password' => $userData['password'],   
            ]);
        }
    }

    private function getUsers() {
        return [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Richard Marcell',
                'email' => 'richard@gmail.com',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Hazel Dixon',
                'email' => 'hazel@gmail.com',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Agustianto',
                'email' => 'agustianto@gmail.com',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Darren Steven',
                'email' => 'darren@gmail.com',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Calvin Tai',
                'email' => 'calvin@gmail.com',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Steven',
                'email' => 'steven@gmail.com',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Dustin Tiovino',
                'email' => 'dustin@gmail.com',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Nieven Carlin',
                'email' => 'nieven@gmail.com',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
        ];
    }
}
