<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->getStudent() as $studentData)
        {
            Student::create([
                'nim' => $studentData['nim'],
                'name' => $studentData['name'],
                'email' => $studentData['email'],
            ]);
        }
    }

    private function getStudent(): array
    {
        return [
            [
                'nim' => 'STI2210001',
                'name' => 'Richard Marcell',
                'email' => 'richard@gmail.com',
            ],
            [
                'nim' => 'STI2210002',
                'name' => 'Hazel Dixon',
                'email' => 'hazel@gmail.com',
            ],
            [
                'nim' => 'STI2210003',
                'name' => 'Agustianto',
                'email' => 'agustianto@gmail.com',
            ],
            [
                'nim' => 'STI2210004',
                'name' => 'Darren Steven',
                'email' => 'darren@gmail.com',
            ],
            [
                'nim' => 'STI2210005',
                'name' => 'Calvin Tai',
                'email' => 'calvin@gmail.com',
            ],
            [
                'nim' => 'STI2210006',
                'name' => 'Steven',
                'email' => 'steven@gmail.com',
            ],
            [
                'nim' => 'STI2210007',
                'name' => 'Dustin Tiovino',
                'email' => 'dustin@gmail.com',
            ],
            [
                'nim' => 'STI2210008',
                'name' => 'Nieven Carlin',
                'email' => 'nieven@gmail.com',
            ],
        ];
    }

}
