@extends('layouts.app')

@section('title', 'Tasks')
@section('content')
    <div class="task">
        <h2 style="text-align: center">Tasks</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
            + Add Task
        </button>

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

                    <div class="d-flex gap-1">
                        <button class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editTaskModal{{$task->id}}"
                        >
                            ✏
                        </button>
                        <form action="{{route('tasks.destroy', $task)}}" method="POST" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this task?')"
                                    title="Delete task">
                                🗑
                            </button>
                        </form>
                    </div>
                </li>

                <div class="modal fade" id="editTaskModal{{$task->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('tasks.update', $task->id)}}" method="POST">
                                @csrf @method('PATCH')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Task</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name{{$task->id}}" class="form-label">Task name</label>
                                        <input type="text" name="name" value="{{$task->name}}"
                                               id="name{{$task->id}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description"
                                                  class="form-control">{{$task->description}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="open" {{$task->status === 'open' ? 'selected' : ''}}>Open
                                            </option>
                                            <option value="closed" {{$task->status === 'closed' ? 'selected' : ''}}>
                                                Closed
                                            </option>
                                            <option
                                                value="completed" {{$task->status === 'completed' ? 'selected' : ''}}>
                                                Completed
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">User</label>
                                        <select name="user_id" class="form-select">
                                            @foreach($users as $user)
                                                <option
                                                    value="{{$user->id}}" {{$task->user_id == $user->id ? 'selected' : ''}}>
                                                    {{$user->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel
                                    </button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('tasks.store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Task Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">User</label>
                            <select name="user_id" class="form-select" required>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
