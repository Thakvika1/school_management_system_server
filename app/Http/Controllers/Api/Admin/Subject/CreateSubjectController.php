<?php

namespace App\Http\Controllers\Api\Admin\Subject;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;

class CreateSubjectController extends Controller
{
    public function storeSubject(Request $request)
    {
        DB::beginTransaction();
        try {
            $validateSubject = $request->validate([
                'name' => 'required|string|max:255|unique:subjects',
                'description' => 'required|string|min:10|max:255'
            ]);

            $subject = Subject::create($validateSubject);

            return response()->json([
                'status' => 'success',
                'message' =>'Subject create successful',
                'data' => $subject
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Create failed',
                'error' => $e->getMessage()
            ]);
        }
    }
}
