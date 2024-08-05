<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        return Training::all();
    }

    public function show($id)
    {
        return Training::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
        ]);

        return Training::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
        ]);

        $training->update($validatedData);
        return $training;
    }

    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();
        return response()->noContent();
    }
}
