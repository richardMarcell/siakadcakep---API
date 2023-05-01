<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectStoreRequest;
use App\Http\Requests\SubjectUpdateRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index() {
        $subjectCollection = Subject::get();

        return SubjectResource::collection($subjectCollection);
    }

    public function show(Subject $subject) {
        return new SubjectResource($subject);
    }

    public function store(SubjectStoreRequest $request) {
        $validatedData = $request->validated();
        $validatedData['subject_code'] = $request->subject_code;
        $validatedData['name'] = $request->name;
        $validatedData['lecture'] = $request->lecture;
        $validatedData['sks'] = $request->sks;

        $subject = Subject::create($validatedData);

        return new subjectResource($subject);
    }

    public function update(SubjectUpdateRequest $request, subject $subject) {
        $subject->update($request->validated());

        return new SubjectResource($subject);
    }

    public function destroy(Subject $subject) {
        $subject->delete();

        return response()->noContent();
    }
}
