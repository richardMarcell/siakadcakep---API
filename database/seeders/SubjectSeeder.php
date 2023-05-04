<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->getSubject() as $subjectData)
        {
            Subject::create([
                'id' => $subjectData['id'],
                'name' => $subjectData['name'],
                'lecture' => $subjectData['lecture'],
                'sks' => $subjectData['sks'],
            ]);
        }
    }

    private function getSubject(): array
    {
        return [
            [
                'id' => 'STI0001',
                'name' => 'Algoritma dan Pemrograman Dasar',
                'lecture' => 'Ms. Yuricha',
                'sks' => 3,
            ],
            [
                'id' => 'STI0002',
                'name' => 'Struktur Data',
                'lecture' => 'Mr. Daniel',
                'sks' => 3,
            ],
            [
                'id' => 'STI0003',
                'name' => 'UX Design',
                'lecture' => 'Mr Filbert',
                'sks' => 3,
            ],
            [
                'id' => 'STI0004',
                'name' => 'Transformasi Digital',
                'lecture' => 'Mr. Brian',
                'sks' => 3,
            ],
            [
                'id' => 'STI0005',
                'name' => 'Aljabar Linear',
                'lecture' => 'Mr. Yudi',
                'sks' => 3,
            ],
            [
                'id' => 'STI0006',
                'name' => 'UX Design',
                'lecture' => 'Mr. Brian',
                'sks' => 3,
            ],
            [
                'id' => 'STI0007',
                'name' => 'Matematika Diskrit',
                'lecture' => 'Mr. Brian',
                'sks' => 3,
            ],
            [
                'id' => 'STI0008',
                'name' => 'Jaringan Komputer dan Komunikasi Data',
                'lecture' => 'Mr. Filbert',
                'sks' => 3,
            ],
            [
                'id' => 'STI0009',
                'name' => 'Pemrograman Web Dasar',
                'lecture' => 'Ms. Yuricha',
                'sks' => 3,
            ],
            [
                'id' => 'STI0010',
                'name' => 'Sistem Basis Data',
                'lecture' => 'Mr. Daniel',
                'sks' => 3,
            ],
        ];
    }
}
