<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CreateUserController extends Controller
{
    // create teacher
    public function storeTeacher(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if(!$validatedData) {
            return response()->json([
                'message' => 'Invalid data'
            ], 400);
        }

    }

}
