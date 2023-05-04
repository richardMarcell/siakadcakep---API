<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LearningPlanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
                'id' => $this->id,
                'student_id' => $this->student->id,
                'name' => $this->student->name,
                'email' => $this->student->email,
                'subjects' => $this->resource['subjects'], // Menggunakan $this->resource['subjects'] sebagai ganti $this->subjects
                'periode' => $this->periode,
                'status' => $this->status,
        ];
    }
}
