<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manrope&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Expletus+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/history.css">
    <title>FruityRipe</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function(){
            $('#icon-menu').click(function(){
                $('ul').toggleClass('show');
            });
        });
    </script>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="./assets/images/fruityripe-logo.png" alt="">
        </div>
        <label class="logo-title">Fruity<span>Ripe</span></label>
        <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Login</a></li>
            <li><i class="fas fa-user"></i></li>
        </ul>
        <label class="icon-menu" id="icon-menu">
            <i class="fas fa-bars"></i>
        </label>
    </nav>
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
                        <img src="./assets/images/Banana.png" alt="">
                        <span class="option-text">Banana</span>
                    </li>
                    <li class="option">
                        <img src="./assets/images/Apple.png" alt="">
                        <span class="option-text">Apple</span>
                    </li>
                    <li class="option">
                        <img src="./assets/images/Mango.png" alt="">
                        <span class="option-text">Mango</span>
                    </li>
                    <li class="option">
                        <img src="./assets/images/Papaya.png" alt="">
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
        <div class="history-list">
            <div class="history-day">
                <p>05 Dec 2023</p>
                <div class="history-card">
                    <img src="./assets/images/apple-result.jpg" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">15:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="./assets/images/apple-result.jpg" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">14:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="./assets/images/apple-result.jpg" alt="">
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
                    <img src="./assets/images/apple-result.jpg" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">15:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="./assets/images/apple-result.jpg" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">14:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="./assets/images/apple-result.jpg" alt="">
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
                    <img src="./assets/images/apple-result.jpg" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">15:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="./assets/images/apple-result.jpg" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">14:53:48 WIB</p>
                    </div>
                </div>
                <div class="history-card">
                    <img src="./assets/images/apple-result.jpg" alt="">
                    <div class="history-desc">
                        <p class="fruit-name">Tomato</p>
                        <p class="fruit-status">Unripe</p>
                        <p class="fruit-time">13:53:48 WIB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    
</body>
</html>