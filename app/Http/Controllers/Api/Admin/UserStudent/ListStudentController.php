<?php

namespace App\Http\Controllers\Api\Admin\UserStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class ListStudentController extends Controller
{
    public function index()
    {
        $student = Student::with('user')->get();

        return response()->json([
            'status' => 'success',
            'student' => $student
        ]);
    }
    
}
