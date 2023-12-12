@extends('layouts.register')

@section('content')
<section class="main">
    <div class="login-container">
        <img class="logo" src="{{ asset('images/fruityripe-logo.png') }}" alt="">
        <p class="title">Register account</p>
        <form class="login-form" action="{{ url('register') }}" method="POST">
            @csrf
            <div class="form-control">
                <input type="text" name="firstname" placeholder="Firstname" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="text" name="lastname" placeholder="Lastname" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="text" name="email" placeholder="Email" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="form-control">
                <input type="text" name="username" placeholder="Username" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="text" name="password" placeholder="Password" id="password" required>
                <i class="fas fa-eye" id="show-password"></i>
            </div>
            <div class="form-control">
                <input type="text" placeholder="Confirm Password" id="confirm-password" required>
                <i class="fas fa-eye" id="show-confirm-password"></i>
            </div>
            <button class="submit">Register</button>
            <div class="back-login">
                <a href="#"><span>Already have an account? Login</span></a>
            </div>
        </form>
    </div>
</section>
@endsection