<?php

namespace App\Http\Controllers\Api\Admin\UserTeacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;

class EditTeacherController extends Controller
{
    public function update(Request $r, $id)
    {
        try {
            $teacher = Teacher::with('user')->findOrFail($id);

            $user = User::find($teacher->user_id);

            $validatedData = $r->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            ]);

            $user->update($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Teacher updated successfully',
                'teacher' => $teacher->fresh('user')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
