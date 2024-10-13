<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:tasks,title',
            'description' => 'nullable|string',
            'status' => 'in:pending,completed',
            'due_date' => 'required|date|after:today',
        ]);

        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('status') && $request->input('status') !== '') {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('due_date') && $request->input('due_date') !== '') {
            $query->whereDate('due_date', $request->input('due_date'));
        }

        if ($request->has('search') && $request->input('search') !== '') {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        $perPage = $request->input('per_page', 10);
        $tasks = $query->paginate($perPage);

        return response()->json($tasks);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $this->validate($request, [
            'title' => 'required|string|max:255|unique:tasks,title,' . $task->id,
            'description' => 'nullable|string',
            'status' => 'in:pending,completed',
            'due_date' => 'required|date|after:today',
        ]);

        $task->update($request->all());

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
