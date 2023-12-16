<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manrope&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/result.css">
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
            <img src="{{ asset('images/fruitytipe-logo.png') }}" alt="">
        </div>
        <label class="logo-title">FruityRipe</label>
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
    <div class="fruit-name">
        <p>Apple</p>
    </div>
    <div class="wrapper">
        <img src="{{ asset('images/apple-result.png') }}" alt="">
        <div class="card-result">
            <div class="date">
                <p>Wednesday, 06 Dec 2023 - 15:53:48 WIB</p>
            </div>
            <p>The apple you entered is identified as:</p>
            <div class="fruit-status">
                <p>Unripe</p>
            </div>
        </div>
        
    </div>
</body>
</html>