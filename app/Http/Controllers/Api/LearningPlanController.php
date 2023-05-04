<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LearningPlanStoreRequest;
use App\Http\Resources\LearningPlanResource;
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
    
        return LearningPlanResource::collection($learningPlans);
    }

    public function showNotif($student_id) {
        $learningPlanCollection = LearningPlan::where('status','=','accept')
            ->orWhere('status','=','reject')
            ->where('student_id','=',$student_id)
            ->with('student.subjects')
            ->get()
            ->groupBy('student_id');
    
        $learningPlans = [];
    
        foreach ($learningPlanCollection as $learningPlansByStudent) {
            $learningPlan = $learningPlansByStudent->first();
            $learningPlan['subjects'] = $this->getSubjects($learningPlansByStudent);
            $learningPlans[] = $learningPlan;
        }
    
        return LearningPlanResource::collection($learningPlans);
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

    public function show(LearningPlan $learning) {
        $learning->load('student.subjects');
        $subjects = $this->getSubjects(collect([$learning]));
        $learning['subjects'] = $subjects;
        return new LearningPlanResource($learning);
    }

    public function accept(Request $request)
    {
        LearningPlan::where('student_id', $request->student_id)->update(['status' => 'accept']);

        return response()->json(['message' => 'Learning plans for student ' . $request->student_id . ' have been accepted.']);
    }

    public function reject(Request $request)
    {
        LearningPlan::where('student_id', $request->student_id)->update(['status' => 'reject']);

        return response()->json(['message' => 'Learning plans for student ' . $request->student_id . ' have been rejected.']);
    }

    public function store(LearningPlanStoreRequest $request) {
        $validatedData = $request->validated();
        $validatedData['student_id'] = $request->student_id;
        $validatedData['periode'] = $request->periode;
        $validatedData['status'] = $request->status;
        
        $validatedData['subject_id'] = $request->subject_id;

        $learningPlan = LearningPlan::create($validatedData);

        return response()->json($learningPlan);
    }

    public function showSubject($student_id) {
        $learningPlan = LearningPlan::where('student_id', '=', $student_id )
        ->where('status', '=', 'waiting')
        ->orWhere('status', '=', 'accept')
        ->with('subject')->get();
    
        return response()->json($learningPlan);
    }

}
