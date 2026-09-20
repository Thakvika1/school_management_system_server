<?php

namespace App\Http\Controllers\Api\Admin\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;

class EditGroupController extends Controller
{
    public function update(Request $r, $id)
    {
        try {
            $group = Group::find($id);
            if (!$group) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Group not found'
                ], 404);
            }

            $validateName = $r->validate([
                'name' => 'required|string|max:255|unique:groups'
            ]);
            $group->update($validateName);

            return response()->json([
                'status' => 'success',
                'message' => 'Group updated successfully',
                'group' => $group
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update group',
                'error' => $e->getMessage()
            ]);
        }
    }
}
