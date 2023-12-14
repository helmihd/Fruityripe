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
        <div class="content-mango">
            <div class="circle-mango"></div>
            <img src="{{ asset('images/mango.png') }}" alt="">
            <p>Mango</p>
        </div>
        <div class="content-papaya">
            <div class="circle-papaya"></div>
            <img src="{{ asset('images/papaya.png') }}" alt="">
            <p>Papaya</p>
        </div>
        <div class="content-avocado">
            <div class="circle-avocado"></div>
            <img src="{{ asset('images/avocado.png') }}" alt="">
            <p>Avocado</p>
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
        <div class="content-watermelon">
            <div class="circle-watermelon"></div>
            <img src="{{ asset('images/watermelon.png') }}" alt="">
            <p>Watermelon</p>
        </div>
    </div>

    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form id="uploadForm" action="{{ url('/upload-image') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="fileInput">Choose Image:</label>
        <input type="file" name="fileInput" id="fileInput" accept="image/*">
        <button type="submit">Upload Image</button>
        <div id="username" data-username="{{ session('username') }}" style="display: none;"></div>
    </form>

    <button type="button" onclick="uploadImage()">Unggah Gambar</button>
    <ul id="imageList"></ul>
@endsection

@section('script')
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function(){
            $('#icon-menu').click(function(){
                $('ul').toggleClass('show');
            });
        });
    </script>
    <script src="{{ asset('js/uploadImage.js') }}"></script>
@endsection