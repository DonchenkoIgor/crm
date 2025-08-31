<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $users = User::all();
        $tasks = Task::all();
        return view('tasks.index', compact('tasks', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'user_id' => 'required|exists:App\Models\User,id',
        ]);

        Task::create($request->only(['name', 'description', 'user_id']));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function update(Request $request, Task $task)
    {
        $validate = $request->validate([
            'status' => 'required|in:open,closed,completed',
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'user_id' => 'required|exists:App\Models\User,id',
        ]);

        $task->update($validate);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

}
