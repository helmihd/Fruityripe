<nav>
    <div class="logo">
        <img src="{{ asset('images/fruityripe-logo.png') }}" alt="">
    </div>
    <label class="logo-title">FruityRipe</label>
    <ul>
        <li><a href="#">About</a></li>
        <li><a href="#">History</a></li>
        @if(session('username'))
            <li><a href="{{ route('logout') }}">Logout</a></li>
            <li><i class="fa-solid fa-user-check"></i></li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><i class="fas fa-user"></i></li>
        @endif
    </ul>
    <label class="icon-menu" id="icon-menu">
        <i class="fas fa-bars"></i>
    </label>
</nav>