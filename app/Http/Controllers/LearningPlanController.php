<?php

namespace App\Http\Controllers;

use App\Models\LearningPlan;
use Illuminate\Http\Request;

class LearningPlanController extends Controller
{
    public function index() {
        $learningPlanCollection = LearningPlan::where('status','=','waiting')
            ->with('student.subjects')
            ->get()
            ->groupBy('student_id');
    
        $learningPlans = [];
    
        foreach ($learningPlanCollection as $learningPlansByStudent) {
            $learningPlan = $learningPlansByStudent->first();
            $learningPlan['subjects'] = $this->getSubjects($learningPlansByStudent);
            $learningPlans[] = $learningPlan;
        }
    
        return response()->json(['data' => $learningPlans]);
    }

    private function getSubjects($learningPlansByStudent)
{
    $subjects = [];

    foreach ($learningPlansByStudent as $learningPlan) {
        foreach ($learningPlan->student->subjects as $subject) {
            $subjectData = [
                'id' => $subject->id,
                'name' => $subject->name,
                'lecture' => $subject->lecture,
                'sks' => $subject->sks
            ];

            if (!in_array($subjectData, $subjects)) {
                $subjects[] = $subjectData;
            }
        }
    }

    return $subjects;
}
}
