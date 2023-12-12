@extends('layouts.login')

@section('content')
<section class="main">
    <div class="login-container">
        <img class="logo" src="{{ asset('images/fruityripe-logo.png') }}" alt="">
        <p class="title">Sign in to your account</p>
        <form class="login-form" action="{{ url('login') }}" method="POST">
            @csrf
            <div class="form-control">
                <input type="text" placeholder="Username or email" name="username" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="text" placeholder="Password" name="password" required>
                <i class="fas fa-lock"></i>
            </div>
            <div class="remember-forgot">
                <label for=""><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button class="submit">Sign in</button>
            <div class="separate">
                <hr>
                <span>Or sign in with</span>
                <hr>
            </div>
            <button class="login-google"><img src="{{ asset('images/google-icon.png') }}" alt=""></button>
            <div class="new-user">
                <p>New user? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </div>
</section>
@endsection