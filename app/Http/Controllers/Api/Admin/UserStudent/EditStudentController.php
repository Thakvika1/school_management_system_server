<?php

namespace App\Http\Controllers\Api\Admin\UserStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class EditStudentController extends Controller
{
    public function update(Request $request, $id)
    {
        try
        {
            $student = Student::with('user')->findOrFail($id);

            $user = User::find($student->user_id);
            $validateDated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|string|email|max:255|unique:users,email', $user->id,
            ]);

            $user -> update($validateDated);

            return response()->json([
                'status' => 'success',
                'message' => 'Student update successful',
                'student' => $student->feash('user')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
