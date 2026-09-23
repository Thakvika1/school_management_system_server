<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication Controller
use App\Http\Controllers\Api\Authentication\LoginController;
use App\Http\Controllers\Api\Authentication\LogoutController;

// Admin User Teacher Controller
use App\Http\Controllers\Api\Admin\UserTeacher\ListTeacherController;
use App\Http\Controllers\Api\Admin\UserTeacher\CreateTeacherController;
use App\Http\Controllers\Api\Admin\UserTeacher\DetailTacherController;
use App\Http\Controllers\Api\Admin\UserTeacher\EditTeacherController;
use App\Http\Controllers\Api\Admin\UserTeacher\DeleteTeacherController;

// Admin User Student Controller
use App\Http\Controllers\Api\Admin\UserStudent\ListStudentController;
use App\Http\Controllers\Api\Admin\UserStudent\CreateStudentController;
use App\Http\Controllers\Api\Admin\UserStudent\DetailStudentController;
use App\Http\Controllers\Api\Admin\UserStudent\EditStudentController;
use App\Http\Controllers\Api\Admin\UserStudent\DeleteStudentController;

// Admin Group Controller
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
    // User Teacher
    Route::get('/admin/teacher/list', [ListTeacherController::class, 'index']);
    Route::post('/admin/create/teacher', [CreateTeacherController::class, 'storeTeacher']);
    Route::get('/admin/teacher/detail/{id}', [DetailTacherController::class, 'show']);
    Route::put('/admin/teacher/update/{id}', [EditTeacherController::class, 'update']);
    Route::delete('/admin/teacher/delete/{id}', [DeleteTeacherController::class, 'destroy']);

    // User Student
    Route::get('/admin/student/list', [ListStudentController::class, 'index']);
    Route::post('/admin/create/student', [CreateStudentController::class, 'storeStudent']);
    Route::get('/admin/student/detail/{id}', [DetailStudentController::class, 'show']);
    Route::put('/admin/student/update/{id}', [EditStudentController::class, 'update']);
    Route::delete('/admin/student/delete/{id}', [DeleteStudentController::class, 'destroy']);


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

