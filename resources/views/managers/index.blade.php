@extends('layouts.app')

@section('title', 'Managers')
@section('content')
    <div class="managers">
        <h2 style="text-align: center">Managers</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addManagerModal">
            + Add Manager
        </button>

        <ul>
            @foreach($managers as $manager)
                <li class="d-flex justify-content-between align-items-center">
                    <span>
                    {{$manager->name}} - {{$manager->email}} - {{$manager->role}}
                        </span>
                    <div class="d-flex gap-1">
                        <button class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editManagerModal{{$manager->id}}">
                            ✏
                        </button>
                        <form action="{{route('managers.destroy', $manager)}}" method="post" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this manager?')"
                                    title="Delete manager">
                                🗑
                            </button>
                        </form>
                    </div>
                </li>
                <div class="modal fade" id="editManagerModal{{$manager->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{route('managers.update', $manager->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Manager</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name{{$manager->id}}" class="form-label">Name</label>
                                        <input type="text" name="name" value="{{$manager->name}}"
                                               id="name{{$manager->id}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email{{$manager->id}}" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{$manager->email}}"
                                               id="email{{$manager->id}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password{{$manager->id}}" class="form-label">Password</label>
                                        <input type="password" name="password" id="password{{$manager->id}}"
                                               class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="role{{$manager->id}}" class="form-label">Role</label>
                                        <select name="role" id="role{{$manager->id}}" class="form-select">
                                            <option value="admin" {{$manager->role === 'admin' ? 'selected' : ''}}>
                                                Admin
                                            </option>
                                            <option value="manager" {{$manager->role === 'manager' ? 'selected' : ''}}>
                                                Manager
                                            </option>
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

    <div class="modal fade" id="addManagerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('managers.store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Manager</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Choose a role</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="">-- Select a role</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
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

