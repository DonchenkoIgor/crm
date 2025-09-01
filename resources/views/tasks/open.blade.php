@extends('layouts.app')

@section('title', 'Opened Tasks')
@section('content')
    <div class="opened-tasks">
        <h2 style="text-align: center">Opened Tasks</h2>
        <ul>
            @foreach($tasks as $task)
                <li class="d-flex justify-content-between align-items-center">
                <span>
                    {{$task->name}}
                    @if($task->description)
                        - {{$task->description}}
                    @endif
                    - <strong>{{ $task->status }}</strong>
                    ({{$task->user->name}})
                </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
