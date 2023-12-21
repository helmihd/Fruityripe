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
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <title>About Us</title>
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
    <section class="about">
        <div class="main">
            <img src="./assets/images/apple-result.jpg" alt="" width="100px">
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
                    <button type="button" class="btn2">Upload Now</button>
                </div>
            </div>
        </div>
    </section>
    <script>
        
    </script>
    
</body>
</html>