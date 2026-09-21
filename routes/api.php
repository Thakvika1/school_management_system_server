<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication Controller
use App\Http\Controllers\Api\Authentication\LoginController;
use App\Http\Controllers\Api\Authentication\LogoutController;

// Admin Controller
use App\Http\Controllers\Api\Admin\CreateUserController;

use App\Http\Controllers\Api\Admin\Group\ListGroupController;
use App\Http\Controllers\Api\Admin\Group\DetailGroupController;
use App\Http\Controllers\Api\Admin\Group\CreateGroupController;
use App\Http\Controllers\Api\Admin\Group\EditGroupController;
use App\Http\Controllers\Api\Admin\Group\DeleteGroupController;


// Teacher Controller
use App\Http\Controllers\Api\Teacher\TestController;

// Student Controller
use App\Http\Controllers\Api\Student\StudentTestController;



// Public Routes
Route::post('/login', [LoginController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout']);
});


//  Admin Routes
Route::middleware(['auth:sanctum', 'Admin'])->group(function () {
    // User
    Route::post('/admin/create/teacher', [CreateUserController::class, 'storeTeacher']);

    // Group
    Route::get('/admin/group/list', [ListGroupController::class, 'index']);
    Route::get('/admin/group/detail/{id}', [DetailGroupController::class, 'show']);
    Route::post('/admin/group/create', [CreateGroupController::class, 'store']);
    Route::put('/admin/group/update/{id}', [EditGroupController::class, 'update']);
    Route::delete('/admin/group/delete/{id}', [DeleteGroupController::class, 'destroy']);
});


// Teacher Routes
Route::middleware(['auth:sanctum', 'Teacher'])->group(function () {
    Route::get('/test', [TestController::class, 'index']);
});


// Student Routes
Route::middleware(['auth:sanctum', 'Student'])->group(function () {
    Route::get('/student', [StudentTestController::class, 'index']);
});
