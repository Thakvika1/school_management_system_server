<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication Controller
use App\Http\Controllers\Api\Authentication\LoginController;

// Admin Controller
use App\Http\Controllers\Api\Admin\CreateUserController;
use App\Http\Controllers\Api\Admin\Group\CreateGroupController;

// Teacher Controller
use App\Http\Controllers\Api\Teacher\TestController;

// Student Controller
use App\Http\Controllers\Api\Student\StudentTestController;



// Auth Routes
Route::post('/login', [LoginController::class, 'login']);



//  Admin Routes
Route::middleware(['auth:sanctum', 'Admin'])->group(function () {
    Route::post('/admin/create/teacher', [CreateUserController::class, 'storeTeacher']);
    Route::post('/admin/create/group', [CreateGroupController::class, 'store']);
});


// Teacher Routes
Route::middleware(['auth:sanctum', 'Teacher'])->group(function () {
    Route::get('/test', [TestController::class, 'index']);
});


// Student Routes
Route::middleware(['auth:sanctum', 'Student'])->group(function () {
    Route::get('/student', [StudentTestController::class, 'index']);
});
