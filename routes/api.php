<?php

use App\Http\Controllers\Api\LearningPlanController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::prefix('v1')->group(function() {
        Route::prefix('students')->name('students')->group(function() {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/{student}', [StudentController::class, 'show'])->name('show');
            Route::post('/', [StudentController::class, 'store'])->name('store');
            Route::put('/{student}', [StudentController::class, 'update'])->name('update');
            Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('subjects')->name('subjects')->group(function() {
            Route::get('/', [SubjectController::class, 'index'])->name('index');
            Route::get('/{subject}', [SubjectController::class, 'show'])->name('show');
            Route::post('/', [SubjectController::class, 'store'])->name('store');
            Route::put('/{subject}', [SubjectController::class, 'update'])->name('update');
            Route::delete('/{subject}', [SubjectController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('learning_plans')->name('learning_plans')->group(function() {
            Route::get('/', [LearningPlanController::class, 'index'])->name('index');
            Route::post('/', [LearningPlanController::class, 'store'])->name('store');
            Route::get('/{learning}', [LearningPlanController::class, 'show'])->name('show');
            Route::put('/accept', [LearningPlanController::class, 'accept']);
            Route::put('/reject', [LearningPlanController::class, 'reject']);
            Route::get('/subjects/{student_id}', [LearningPlanController::class, 'showSubject']);
            Route::get('/notification/{student_id}', [LearningPlanController::class, 'showNotif']);
        });
    });
});


