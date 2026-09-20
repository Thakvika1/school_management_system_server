<?php

namespace App\Http\Controllers\Api\Admin\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use Exception;

class DetailGroupController extends Controller
{
    public function show($id)
    {
        $group = Group::find($id);
        if (!$group) {
            return response()->json([
                'status' => 'error',
                'message' => 'Group not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'group' => $group
        ]);
    }
}
