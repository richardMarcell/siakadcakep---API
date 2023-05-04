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
                'nim' => $userData['nim'],   
                'role' => $userData['role'],   
                'password' => $userData['password'],   
            ]);
        }
    }

    private function getUsers() {
        return [
            [
                'name' => 'admin',
                'nim' => 'STIAdmin',
                'role' => 'admin',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Richard Marcell',
                'nim' => 'STI2210001',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Hazel Dixon',
                'nim' => 'STI2210002',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Agustianto',
                'nim' => 'STI2210003',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Darren Steven',
                'nim' => 'STI2210004',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Calvin Tai',
                'nim' => 'STI2210005',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Steven',
                'nim' => 'STI2210006',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Dustin Tiovino',
                'nim' => 'STI2210007',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
            [
                'name' => 'Nieven Carlin',
                'nim' => 'STI2210008',
                'role' => 'student',
                'password' => Hash::make('nasigoreng123'),
            ],
        ];
    }
}
