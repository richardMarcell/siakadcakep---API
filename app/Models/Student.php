<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'name',
        'email',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'learning_plans', 'student_id', 'subject_id')
            ->withPivot('status');
    }
}
