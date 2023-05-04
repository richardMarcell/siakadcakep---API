<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'learning_plans', 'student_id', 'subject_id')
            ->withPivot('status', 'periode');
    }
}
