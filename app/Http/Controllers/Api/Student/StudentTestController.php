<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentTestController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'success'
        ]);
    }
}
