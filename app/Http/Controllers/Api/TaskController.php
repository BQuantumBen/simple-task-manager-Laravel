<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Retrieve all tasks for the authenticated user
    public function index(): AnonymousResourceCollection
    {
        $tasks = Auth::user()->tasks;

        return TaskResource::collection($tasks, 200);
    }

    public function store(Request $request): JsonResource
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:tasks',
            'description' => 'nullable',
            'due_date' => 'required|date',
        ]);

        $task = Task::create([
            'user_id' => auth()->id(),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'due_date' => $validatedData['due_date'],
            'completion_status' => false,
        ]);

        return new TaskResource($task, 201);
    }

    public function update(Request $request, $taskId): JsonResource
    {
        // Find the task by ID
        $task = Task::find($taskId);

        // Check if the task exists
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update($request->all());

        return new TaskResource($task, 200);
    }


    public function updateAsCompleted(Request $request, $taskId)
    {
        // Find the task by ID
        $task = Task::find($taskId);

        // dd($task);
        // Check if the task exists
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        // Check if completion status is changing
        if ($task->completion_status == 0) {

            $task->update(['completion_status' => 1]);
        }

        if ($task->completion_status == 1) {

            return response()->json(['message' => 'Task already marked as completed'], 404);
        }

        // Refresh the task to get the updated model from the database
        // $task->refresh();

        return response()->json(new TaskResource($task), 200);
    }

    public function destroy($taskId)
    {
        // Find the task by ID
        $task = Task::find($taskId);

        // Check if the task exists
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task Deleted'], 200);
    }
}
