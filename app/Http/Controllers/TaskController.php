<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:100",
            "description" => "required|max:255",
            "due_date" => "required|date",
            "status_id" => "required|exists:statuses,id"
        ]);
        $task = Task::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'status_id' => $request->input('status_id')
        ]);
        return response()->json($task);
        if ($validate->fails())
        {
            return \response()->json([
                'success' => false,
                'message' => "Error occurred, please try again",
                'data' => []
            ], 400);
        }
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'max:100',
            'description' => 'max:255',
            'due_date' => 'date',
            'status_id' => 'exists:statuses,id'
        ]);

        $task->update($request->all());

        return response()->json($task);
        if ($validate->fails())
        {
            return \response()->json([
                'success' => false,
                'message' => "Error occurred, please try again",
                'data' => []
            ], 400);
        }

    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json("Task deleted successfully");
    }
}
