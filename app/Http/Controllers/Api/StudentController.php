<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $studentCollection = Student::get();

        return StudentResource::collection($studentCollection);
    }

    public function show(Student $student) {
        return new StudentResource($student);
    }

    public function store(StudentStoreRequest $request) {
        $validatedData = $request->validated();
        $validatedData['nim'] = $request->nim;
        $validatedData['name'] = $request->name;
        $validatedData['email'] = $request->email;
        $student = Student::create($validatedData);

        return new StudentResource($student);
    }

    public function update(StudentUpdateRequest $request, Student $student) {
        $student->update($request->validated());

        return new StudentResource($student);
    }

    public function destroy(Student $student) {
        $student->delete();

        return response()->noContent();
    }
}
