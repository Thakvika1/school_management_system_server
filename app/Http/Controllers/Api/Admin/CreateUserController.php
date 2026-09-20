<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Exception;

class CreateUserController extends Controller
{
    // create teacher
    public function storeTeacher(Request $request)
    {
        DB::beginTransaction();
        try {
            // validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|string|in:teacher',
                'teacher_code' => 'required|string|max:255|unique:teachers',
            ]);

            // dd($validatedData);

            // create user and teacher
            $user = User::create($validatedData);
            Teacher::create([
                'user_id' => $user->id,
                'teacher_code' => $validatedData['teacher_code']
            ]);

            // if validation passes, insert to database
            DB::commit();

            // return the created user with teacher relationship as api response
            return response()->json([
                'message' => 'Teacher created successfully',
                'user' => $user->with('teacher')->find($user->id),
            ]);
        } catch (Exception $e) {
            // if validation fails, rollback the transaction
            DB::rollBack();

            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->getMessage(),
            ], 422);
        }
    }
}
