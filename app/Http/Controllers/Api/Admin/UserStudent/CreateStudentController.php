<?php

namespace App\Http\Controllers\Api\Admin\UserStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Exception;

class CreateStudentController extends Controller
{
    public function storeStudent(Request $request)
    {
        DB::beginTransaction();
        try {
            // validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|string|in:student',
                'student_code' => 'required|string|max:255|unique:students,student_code',
                'group_id' => 'required|integer|exists:groups,id',
                'year' => 'required|integer',
            ]);
            //dd($validatedData);

            $user = User::create($validatedData);
            Student::create([
                'user_id' => $user->id,
                'student_code' => $validatedData['student_code'],
                'group_id' => $validatedData['group_id'],
                'year' => $validatedData['year'],
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Student created successfully',
                'user' => $user->with('student')->find($user->id),
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
