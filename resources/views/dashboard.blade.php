@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <h1 style="text-align: center">Dashboard</h1>

    <div class="dashboard-grid">
        <div class="stat-block last-tasks">
            <h2>Last completed tasks</h2>
            <ul>
                @if(isset($lastCompletedTasks) && $lastCompletedTasks->count())
                    @foreach($lastCompletedTasks as $task)
                        <li>{{$task->name}} - {{$task->updated_at->format('d.m.Y H:i')}}
                            ({{$task->user->name}})
                        </li>
                    @endforeach
                @else
                    <li>No completed tasks yet</li>
                @endif
            </ul>
        </div>

        <div class="stat-block user-rating">
            <h2>Managers rating</h2>
            <ol>
                @foreach($managersRating as $user)
                    <li>{{$user->name}} — {{$user->completed_tasks_count}} tasks</li>
                @endforeach
            </ol>
        </div>

        <div class="stat-block task-count">
            <h2>Number of tasks</h2>
            <ul>
                @foreach($tasksCount as $user)
                    <li>{{$user->name}} — {{$user->tasks_count}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

