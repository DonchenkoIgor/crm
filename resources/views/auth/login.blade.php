@extends('layouts.app')

@section('title', 'Login')
    @section('content')
        <div class="form-container">
            <h2>Log In</h2>

            @if($errors->any())
                <div class="error-block">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('login')}}" method="post">
                @csrf
                <label>Email:
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>
                <label>Password:
                    <input type="password" name="password" required>
                </label>

                <button class="btn" type="submit">Log In</button>

                <p class="redirect">If you don`t have an account? <a href="{{route('showRegistrationForm')}}"><b>Register</b></a></p>
            </form>
        </div>

@endsection
