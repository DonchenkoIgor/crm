<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public  function index()
    {

        $lastCompletedTasks = Task::with('user')
            ->where('status', 'completed')
            ->orderBy('updated_at', 'desc')
            ->take(7)
            ->get();

        $managersRating = User::withCount(['tasks as completed_tasks_count' => function ($query) {
            $query->where('status', 'completed');
        }])
            ->orderByDesc('completed_tasks_count')
            ->take(5)
            ->get();

        $tasksCount = User::withCount('tasks')
            ->orderByDesc('tasks_count')
            ->take(5)
            ->get();

        if (!Auth::check()) {
            return redirect('/login');
        }
        return view('dashboard', compact('lastCompletedTasks', 'managersRating', 'tasksCount'));
    }
}
