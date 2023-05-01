<?php

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
            Route::get('/{id}', [SubjectController::class, 'show'])->name('show');
            Route::post('/', [SubjectController::class, 'store'])->name('store');
            Route::put('/{id}', [SubjectController::class, 'update'])->name('update');
            Route::delete('/{id}', [SubjectController::class, 'destroy'])->name('destroy');
        });
    });
});