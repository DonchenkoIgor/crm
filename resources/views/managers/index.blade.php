@extends('layouts.app')

@section('title', 'Managers')
@section('content')
    <div class="managers">
        <h2 style="text-align: center">Managers</h2>
        <a href="{{route('managers.create')}}" class="btn">+ Add manager</a>

        <ul>
            @foreach($managers as $manager)
                <li>
                    {{$manager->name}} - {{$manager->email}}
                    <form action="{{route('managers.destroy', $manager)}}" method="post" style="display: inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this manager?')" title="Delete manager">🗑</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

