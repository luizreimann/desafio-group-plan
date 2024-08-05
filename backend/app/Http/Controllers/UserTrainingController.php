<?php

namespace App\Http\Controllers;

use App\Models\UserTraining;
use Illuminate\Http\Request;

class UserTrainingController extends Controller
{
    public function assign(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'training_id' => 'required|exists:trainings,id',
            ]);
    
            $userTraining = UserTraining::create([
                'user_id' => $validatedData['user_id'],
                'training_id' => $validatedData['training_id'],
                'status' => 'not_started',
                'progress' => 0,
            ]);
    
            return response()->json($userTraining, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while assigning the training.'], 500);
        }
    }    

    public function updateProgress(Request $request, $id)
    {
        $userTraining = UserTraining::findOrFail($id);
        $validatedData = $request->validate([
            'status' => 'required|in:not_started,in_progress,completed',
            'progress' => 'required|integer|min:0|max:100',
        ]);

        $userTraining->update($validatedData);
        return response()->json($userTraining);
    }

    public function show($id)
    {
        return UserTraining::findOrFail($id);
    }

    public function index()
    {
        return UserTraining::all();
    }
}
