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
                'id' => $studentData['id'],
                'name' => $studentData['name'],
                'email' => $studentData['email'],
            ]);
        }
    }

    private function getStudent(): array
    {
        return [
            [
                'id' => 'STI2210001',
                'name' => 'Richard Marcell',
                'email' => 'richard@gmail.com',
            ],
            [
                'id' => 'STI2210002',
                'name' => 'Hazel Dixon',
                'email' => 'hazel@gmail.com',
            ],
            [
                'id' => 'STI2210003',
                'name' => 'Agustianto',
                'email' => 'agustianto@gmail.com',
            ],
            [
                'id' => 'STI2210004',
                'name' => 'Darren Steven',
                'email' => 'darren@gmail.com',
            ],
            [
                'id' => 'STI2210005',
                'name' => 'Calvin Tai',
                'email' => 'calvin@gmail.com',
            ],
            [
                'id' => 'STI2210006',
                'name' => 'Steven',
                'email' => 'steven@gmail.com',
            ],
            [
                'id' => 'STI2210007',
                'name' => 'Dustin Tiovino',
                'email' => 'dustin@gmail.com',
            ],
            [
                'id' => 'STI2210008',
                'name' => 'Nieven Carlin',
                'email' => 'nieven@gmail.com',
            ],
        ];
    }

}
