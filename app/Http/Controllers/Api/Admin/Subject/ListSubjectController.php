<?php

namespace App\Http\Controllers\Api\Admin\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
class ListSubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::all();

        return response()->json([
            'status' => 'Success',
            'subject' => $subject
        ]);
    }
}
