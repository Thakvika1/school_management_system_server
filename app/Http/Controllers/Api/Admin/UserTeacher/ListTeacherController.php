<?php

namespace App\Http\Controllers\Api\Admin\UserTeacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class ListTeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::with('user')->get();

        return response()->json([
            'status' => "success",
            'teacher' => $teacher
        ]);
    }
}
