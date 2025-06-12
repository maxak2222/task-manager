<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('assigned_to', auth()->id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    public function store(TaskRequest $request)
    {
        Task::create([
            'user_id' => auth()->id(),
            'assigned_to' => $request->assigned_to,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Pending',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task created.');
    }

    public function show(Task $task)
    {
        if ($task->assigned_to !== auth()->id() && $task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('tasks.show', compact('task'));
    }
    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }
}
