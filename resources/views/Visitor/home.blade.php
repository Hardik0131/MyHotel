@extends('Layout/master')

@section('title', 'Home')

@section('vite')

    @vite(['resources/js/home.js', 'resources/css/home.css'])

@endsection

@section('content')

    <nav>
        <div class="web_logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="nav_item">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Rooms</a></li>
                <li><a href="">My Booking</a></li>
                <li><a href="">Contact</a></li>
                <li><a href=""><i class="fa-regular fa-circle-user"></i></a></li>
            </ul>
        </div>
    </nav>
    <div class="body_part">
        <div class="home_top_part">
            <div class="home_image">
                <img src="images/hotel_room1.png" alt="">
            </div>
            <div class="home_text">
                <div class="home_text_text">
                    <h1 class="headline">Experience Luxury <br> and Comfort</h1>
                    <p>Enjoy exceptional service and elegant accomodations.</p>
                </div>
                <button type="button">Book Now</button>
            </div>
        </div>
        <div class="rooms_part">
            <div class="room_title">
                <h1>Rooms</h1>
            </div>
            <div class="room_card">

            </div>
        </div>
    </div>

@endsection
