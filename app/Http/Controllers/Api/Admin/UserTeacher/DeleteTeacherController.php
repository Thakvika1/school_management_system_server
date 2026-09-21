<?php

namespace App\Http\Controllers\Api\Admin\UserTeacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeleteTeacherController extends Controller
{
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $teacher = Teacher::findOrFail($id);

            $user = User::findOrFail($teacher->user_id);

            $teacher->delete();
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
