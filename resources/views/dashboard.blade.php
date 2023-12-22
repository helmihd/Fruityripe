@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="big-title">
        <p>Check Your Fruit</p>
    </div>
    <div class="medium-title">
        @if(session('username'))
            <p>Hello, {{ session('username') }}! You can choose the variety of fruit available.</p>
        @else
            <p>You can choose the variety of fruit available.</p>
        @endif
    </div>
    <div class="gallery">
        <div class="content-banana">
            <div class="circle-banana"></div>
            <img src="{{ asset('images/banana.png') }}" alt="">
            <p>Banana</p>
        </div>
        <div class="content-apple">
            <div class="circle-apple"></div>
            <img src="{{ asset('images/apple-usa.png') }}" alt="">
            <p>Apple</p>
        </div>
        <div class="content-orange">
            <div class="circle-orange"></div>
            <img src="{{ asset('images/orange.png') }}" alt="">
            <p>Orange</p>
        </div>
        <div class="content-papaya">
            <div class="circle-papaya"></div>
            <img src="{{ asset('images/papaya.png') }}" alt="">
            <p>Papaya</p>
        </div>
        <div class="content-snakefruit">
            <div class="circle-snakefruit"></div>
            <img src="{{ asset('images/snakefruit.png') }}" alt="">
            <p>SnakeFruit</p>
        </div>
        <div class="content-pineapple">
            <div class="circle-pineapple"></div>
            <img src="{{ asset('images/pineapple.png') }}" alt="">
            <p>Pineapple</p>
        </div>
        <div class="content-strawberry">
            <div class="circle-strawberry"></div>
            <img src="{{ asset('images/strawberry.png') }}" alt="">
            <p>Strawberry</p>
        </div>
    </div>
    
    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <div class="wrapper">
        <header>Upload your file here!</header>
        <form action="{{ url('/upload-image') }}" id="uploadForm" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" class="file-input" name="fileInput" hidden>
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Browse File to Upload</p>
        </form>
        <section class="progress-area"></section>
        <section class="uploaded-area"></section>
        <button type="button" id="externalButton" class="externalButton">Identify Now</button>
    </div>
@endsection

@section('script')
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://storage.googleapis.com/frutyripe.appspot.com/public/js/uploadImage.js"></script>
    <script src="https://storage.googleapis.com/frutyripe.appspot.com/public/js/landingPage.js"></script>
@endsection