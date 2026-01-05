<nav>
    <div class="web_logo">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>
    <div class="nav_item">
        <ul class="nav_menu">
            <li><a href="{{ route('hotel.home') }}" class="{{ request()->routeIs('hotel.home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('hotel.rooms') }}" class="{{ request()->routeIs('hotel.rooms') ? 'active' : '' }}">Rooms</a></li>
            <li><a href="">My Booking</a></li>
            <li><a href="">Contact</a></li>
            <li><a href=""><i class="ri-notification-4-fill"></i><i class="fa-regular fa-circle-user"></i></a>
            </li>
        </ul>
        <ul class="nav_menu_icon">
            <li><i class="ri-menu-3-line"></i></li>
        </ul>
    </div>
</nav>
