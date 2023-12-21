@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="https://storage.googleapis.com/frutyripe.appspot.com/public/css/history.css">
    <title>History - {{ session('username') }}</title>
@endsection

@section('content')
    <div class="main-title">
        <p>History</p>
    </div>
    <div class="wrapper">
        <div class="filter">
            <div class="category">
                <p>Category</p>
                <div class="category-btn">
                    <span class="category-text">Select a category</span>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <ul class="options">
                    <li class="option">
                        <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/banana.png" alt="">
                        <span class="option-text">Banana</span>
                    </li>
                    <li class="option">
                        <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/apple-usa.png" alt="">
                        <span class="option-text">Apple</span>
                    </li>
                    <li class="option">
                        <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/avocado.png" alt="">
                        <span class="option-text">Mango</span>
                    </li>
                    <li class="option">
                        <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/papaya.png" alt="">
                        <span class="option-text">Papaya</span>
                    </li>
                </ul>
            </div>
            <div class="date">
                <div class="from-date">
                    <p>From date</p>
                    <input type="date">
                </div>
                <div class="to-date">
                    <p>To date</p>
                    <input type="date">
                </div>
            </div>
        </div>
        <h1>Daftar Gambar</h1>

        <ul>
            @foreach ($pictures as $picture)
                <li>
                    <strong>Timestamp:</strong> {{ $picture['timestamp'] }}<br>
                    <strong>Username:</strong> {{ $picture['username'] }}<br>
                </li>
                <br>
            @endforeach
        </ul>
        <div class="history-list">
            <div class="history-day">
                <p>05 Dec 2023</p>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/apple-result.jpg" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">15:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/pineapple.png" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">14:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/watermelon.png" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">13:53:48 WIB</p>
                    </div>
                </div>
            </div>
            <div class="history-day">
                <p>04 Nov 2023</p>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/banana.png" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">15:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/apple-usa.png" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">14:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/avocado.png" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">13:53:48 WIB</p>
                    </div>
                </div>
            </div>
            <div class="history-day">
                <p>03 Oct 2023</p>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/papaya.png" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">15:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/banana.png" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">14:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="https://storage.googleapis.com/frutyripe.appspot.com/public/images/strawberry.png" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">13:53:48 WIB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        const optionCategory = document.querySelector(".category"),
            categoryBtn = optionCategory.querySelector(".category-btn"),
            options = document.querySelectorAll(".option"),
            categoryText = optionCategory.querySelector(".category-text");
    
        categoryBtn.addEventListener("click", () => optionCategory.classList.toggle("active"));
    
        options.forEach(option => {
            option.addEventListener("click", () => {
                let selectedOption = option.querySelector(".option-text").innerText;
                categoryText.innerText = selectedOption;
                console.log(selectedOption);
            });
        });
    </script>
@endsection