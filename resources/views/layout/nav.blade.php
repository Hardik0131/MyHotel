<nav>
    <div class="web_logo">
        <a href="{{ route('hotel.home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
    </div>
    <div class="menu-mobile">
        
    </div>
    <div class="nav_item">
        <ul class="nav_menu" id="mobileNavMenu">
            <li><a href="{{ route('hotel.home') }}"
                    class="{{ request()->routeIs('hotel.home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('hotel.room') }}"
                    class="{{ request()->routeIs('hotel.room*') ? 'active' : '' }}">Rooms</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </li>
            <li id="admin_login_btn">
                <button>
                    <a href="{{ route('admin.login') }}" class="admin-login-link">Admin Login</a>
                </button>
            </li>
        </ul>
        <ul class="nav_menu_icon">
            <li>
                <button type="button" id="mobileMenuToggle" aria-label="Toggle menu" aria-expanded="false"
                    style="background: transparent; border: none; cursor: pointer;">
                    <i class="ri-menu-3-line"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>
