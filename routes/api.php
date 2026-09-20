<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Authentication\LoginController;
use App\Http\Controllers\Api\Admin\CreateUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/login', [LoginController::class, 'login']);

Route::post('/admin/create/teacher', [CreateUserController::class, 'storeTeacher']);