<?php

namespace App\Http\Controllers\Api\Admin\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class ShowSubjectController extends Controller
{
    public function show($id)
    {
        try {
            $subject = Subject::find($id);
            return response()->json([
                'status' => 'Success',
                'subject' => $subject
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }



    }
}
