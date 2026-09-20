<?php

namespace App\Http\Controllers\Api\Admin\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;

class DeleteGroupController extends Controller
{
    public function destroy($id)
    {
        try {
            $group = Group::findOrFail($id);

            $group->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Group deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete group',
                // 'error' => $e->getMessage()
            ], 500);
        }
    }
}
