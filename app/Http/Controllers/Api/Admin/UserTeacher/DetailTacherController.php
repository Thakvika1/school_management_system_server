<?php

namespace App\Http\Controllers\Api\Admin\UserTeacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;

class DetailTacherController extends Controller
{
    public function show($id)
    {
        try {
            $teacher = Teacher::with('user')->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'teacher' => $teacher
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
