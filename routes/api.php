<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Authentication\LoginController;
use App\Http\Controllers\Api\Admin\CreateUserController;
use App\Http\Controllers\Api\Teacher\TestController;
use App\Http\Controllers\Api\Student\StudentTestController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/login', [LoginController::class, 'login']);

//  Admin Routes
Route::middleware(['auth:sanctum', 'Admin'])->group(function () {
    Route::post('/admin/create/teacher', [CreateUserController::class, 'storeTeacher']);
});

Route::middleware(['auth:sanctum', 'Teacher'])->group(function () {
    Route::get('/test', [TestController::class, 'index']);
});


Route::middleware(['auth:sanctum', 'Student'])->group(function () {
    Route::get('/student', [StudentTestController::class, 'index']);
});
