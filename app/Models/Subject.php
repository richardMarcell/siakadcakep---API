<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'lecture',
        'sks',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'learning_plans', 'subject_id', 'student_id')
            ->withPivot('status', 'periode');
    }
}
