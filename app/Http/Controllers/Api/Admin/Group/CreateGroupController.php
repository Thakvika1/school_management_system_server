<?php

namespace App\Http\Controllers\Api\Admin\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use Exception;

class CreateGroupController extends Controller
{
    public function store(Request $r)
    {

        try {
            $validateName = $r->validate([
                'name' => 'required|string|max:255|unique:groups'
            ]);

            $group = Group::create(
                $validateName
            );

            return response()->json([
                'status' => 'success',
                'Group' => $group
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Validate failed',
                'error' => $e->getMessage()
            ]);
        }
    }
}
