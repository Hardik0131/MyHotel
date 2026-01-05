<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Product</div>
        <i class="bx bx-menu" id="btn"></i>
    </div>

    <ul class="nav-list">
        <li>
            <a href="{{ route('admin.rooms') }}" class="{{ request()->routeIs('admin.rooms*') ? 'active' : '' }} sidebar-link" data-url="{{ route('admin.rooms') }}">
                <i class="ri-hotel-bed-line"></i>
                <span class="links_name">Rooms</span>
            </a>
            <span class="tooltip">Rooms</span>
        </li>
        <li>
            <a>
                <i class="ri-shopping-cart-2-line"></i>
                <span class="links_name">Purchase</span>
            </a>
            <span class="tooltip">Purchase</span>
        </li>
        <li>
            <a>
                <i class="ri-unsplash-line"></i>
                <span class="links_name">Sells</span>
            </a>
            <span class="tooltip">Sells</span>
        </li>
        {{-- <li>
            <a href="#" class="sidebar-link">
                <i class="ri-question-answer-line"></i>
                <span class="links_name">Answer</span>
            </a>
            <span class="tooltip">Answer</span>
        </li> --}}
    </ul>
</div>