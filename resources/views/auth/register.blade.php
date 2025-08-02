@extends('layouts.app')

@section('title', 'Register')
    @section('content')
        <div class="form-container">
            <h2>Register</h2>

            @if($errors->any())
                <div class="error-block">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif

            <form action="{{route('register')}}" method="post">
                @csrf
                <label>Name:
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </label>
                <label>Email:
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>
                <label>Password:
                    <input type="password" name="password" required>
                </label>
                <label>Confirmed Password:
                    <input type="password" name="password_confirmation" required>
                </label>
                <button class="btn" type="submit">Register</button>

                <p class="redirect">If you have an account? <a href="{{route('showLoginForm')}}"><b>Log In</b></a></p>
            </form>
        </div>

@endsection
