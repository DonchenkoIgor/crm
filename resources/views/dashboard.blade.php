@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <h1 style="text-align: center">Dashboard</h1>

    <div class="dashboard-grid">
        <div class="stat-block last-tasks">
            <h2>Last completed tasks</h2>
            <ul>
                <li>Task 1 - 01.08.2025 12:30</li>
                <li>Task 2 - 01.08.2025 12:33</li>
                <li>Task 3 - 01.08.2025 12:34</li>
                <li>Task 4 - 01.08.2025 12:55</li>
                <li>Task 5 - 01.08.2025 12:44</li>
                <li>Task 6 - 01.08.2025 12:43</li>
                <li>Task 7 - 01.08.2025 12:32</li>
            </ul>
        </div>

        <div class="stat-block user-rating">
            <h2>Managers rating</h2>
            <ol>
                <li>Igor Donchenko — 34 tasks</li>
                <li>Oleksiy Petrov — 28 tasks</li>
                <li>Olga Ivanova — 22 tasks</li>
                <li>Maryna Lis — 18 tasks</li>
                <li>Sergiy Voronov — 16 tasks</li>
            </ol>
        </div>

        <div class="stat-block task-count">
            <h2>Number of tasks</h2>
            <ul>
                <li>Igor Donchenko — 50 tasks</li>
                <li>Oleksiy Petrov — 35 tasks</li>
                <li>Olga Ivanova — 30 tasks</li>
                <li>Maryna Lis — 25 tasks</li>
                <li>Sergiy Voronov — 20 tasks</li>
            </ul>
        </div>
    </div>
@endsection

