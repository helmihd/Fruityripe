@extends('layouts.auth')

@section('head')
    <link rel="stylesheet" href="https://storage.googleapis.com/frutyripe.appspot.com/public/css/login.css">
    <title>Sign in to FruityRipe</title>
@endsection

@section('content')
    <section class="main">
        <div class="login-container">
            <img class="logo" src="{{ asset('images/fruityripe-logo.png') }}" alt="">
            <p class="title">Sign in to your account</p>

            <form class="login-form" action="{{ url('login') }}" method="POST">
                @csrf

                @if(session('status'))
                    <p class="login-massage">{{ session('status') }}</p>
                @endif
                
                <div class="form-control">
                    <input type="text" placeholder="Username or email" name="username" required>
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" placeholder="Password" name="password" required>
                    <i class="fas fa-lock"></i>
                    
                </div>

                @if(session('error'))
                    <p class="failed-login">{{ session('error') }}</p>
                @endif

                <div class="remember-forgot">
                    <label for="remember"><input type="checkbox" name="remember" id="remember">Remember me</label>
                </div>
                <button class="submit">Sign in</button>
                <div class="new-user">
                    <p>New user? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
@endsection