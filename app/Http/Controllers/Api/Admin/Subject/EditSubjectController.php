<?php

namespace App\Http\Controllers\Api\Admin\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class EditSubjectController extends Controller
{
    public function update(Request $request, $id)
    {
        try
        {
            $subject = Subject::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:subjects,name,' . $subject->id,
                'description' => 'required|string|min:10|max:255'
            ]);

            $subject->update($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Subject updated successfully',
                'data' => $subject
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);

        }
    }
}
