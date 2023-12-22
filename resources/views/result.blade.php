@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="https://storage.googleapis.com/frutyripe.appspot.com/public/css/result.css">
    <title>Result</title>
@endsection

@section('content')
    <div class="fruit-name">
        <p>Apple</p>
    </div>
    <div class="wrapper">
        <img src="{{ asset('images/apple-result.png') }}" alt="">
        <div class="card-result">
            <div class="date">
                <p>Wednesday, 06 Dec 2023 - 15:53:48 WIB</p>
            </div>
            <p>The image you identified has a class</p>
            <div class="fruit-status">
                <p>Unripe</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
@endsection