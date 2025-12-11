<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->orderBy('id', 'DESC')->get();

        return response()->json($tasks, 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate(['title' => 'required|string|max:255']);

            $task = Task::create([
                'title' => strip_tags($request->title),
                'user_id' => Auth::id(),
            ]);

            return response()->json($task, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        }
    }

    public function update(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->is_completed = ! $task->is_completed;
        $task->save();

        return response()->json($task, 200);
    }
}
