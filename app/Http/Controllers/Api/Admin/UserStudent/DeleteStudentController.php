<?php

namespace App\Http\Controllers\Api\Admin\UserStudent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeleteStudentController extends Controller
{
     public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $student = Student::findOrFail($id);

            $user = User::findOrFail($student->user_id);

            $student->delete();
            $user->delete();
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Teacher deleted successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
