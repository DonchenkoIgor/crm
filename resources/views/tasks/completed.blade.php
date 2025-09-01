@extends('layouts.app')

@section('title', 'Completed')
@section('content')
    <div class="completed-tasks">
        <h2 style="text-align: center">Completed Tasks</h2>
        <ul>
            @foreach($completedTasks as $task)
                <li class="d-flex justify-content-between align-items-center">
                    <span>
                        {{$task->name}}
                        @if($task->description)
                            - {{$task->description}}
                        @endif
                        - <strong>{{$task->status}}</strong>
                        ({{$task->user->name}})
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
