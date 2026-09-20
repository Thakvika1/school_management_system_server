<?php

namespace App\Http\Controllers\Api\Admin\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;


class ListGroupController extends Controller
{
    public function index()
    {
        $group = Group::get();
        // dd($group);

        return response()->json([
            'status' => 'Success',
            'Group List' => $group
        ]);
    }
}
