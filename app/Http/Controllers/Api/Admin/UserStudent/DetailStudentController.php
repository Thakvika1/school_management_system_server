<?php

namespace App\Http\Controllers\Api\Admin\UserStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class DetailStudentController extends Controller
{
     public function show($id)
    {
        try {
            $student = Student::with('user')->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'student' => $student
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
