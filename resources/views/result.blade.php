@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="https://storage.googleapis.com/frutyripe.appspot.com/public/css/result.css">
    <title>Result</title>
@endsection

@section('content')
    <!--<div class="fruit-name">
        <p>Apple</p>
    </div>
-->
    <div class="wrapper">
        <img src="https://storage.googleapis.com/frutyripe.appspot.com/result/salak_result.jpeg" alt="">
        <div class="card-result">
            <div class="date">
                <p>Friday, 22 Dec 2023 - 09:03:22 WIB</p>
            </div>
            <p>The image you identified has a class</p>
            <div class="fruit-status">
                <p>fresh - salak</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
@endsection