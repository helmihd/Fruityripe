@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <title>About Us</title>
@endsection

@section('content')
    <section class="about">
        <div class="main">
            <img src="{{ asset('images/about-image.png') }}" alt="">
            <div class="all-text">
                <h4>About Us</h4>
                <h1>Fruit Ripeness Detection Web-Based Application.</h1>
                <p>Technology is crucial in elevating efficiency and service quality in the fruit sales industry, 
                    which predominantly relies on manual assessments by farmers and traders. This often leads to 
                    subjective judgments and creates challenges for consumers unfamiliar with fruits. 
                    Our solution addresses this by introducing a tech-driven approach, streamlining assessments and 
                    empowering all consumers to confidently choose the right fruit.
                </p>
                <div class="btn">
                    <button type="button">Our Team</button>
                    <button type="button" class="btn2" id="uploadButton">Upload Now</button>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            window.location.href = "{{ route('dashboard') }}";
        });
    </script>
@endsection