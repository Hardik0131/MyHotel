<nav>
    <div class="web_logo">
        <a href="{{ route('hotel.home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
    </div>
    <div class="nav_item">
        <ul class="nav_menu">
            <li><a href="{{ route('hotel.home') }}"
                    class="{{ request()->routeIs('hotel.home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('hotel.room') }}"
                    class="{{ request()->routeIs('hotel.room*') ? 'active' : '' }}">Rooms</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </li>
            <li id="admin_login_btn">
                <button>
                    <a href="">Admin Login</a>
                </button>
            </li>
        </ul>
        <ul class="nav_menu_icon">
            <li><i class="ri-menu-3-line"></i></li>
        </ul>
    </div>
</nav>
