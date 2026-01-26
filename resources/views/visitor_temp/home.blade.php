@extends('layout.master')

@section('title', 'Home')

@section('vite')

    @vite(['resources/js/home.js', 'resources/css/home.css'])

@endsection

@section('content')
    <section>
        <div class="body_part">
            <div class="home_top_part">
                <div class="home_image">
                    <img src="{{ asset('images/hotel_room1.png') }}" alt="">
                </div>
                <div class="home_text">
                    <div class="home_text_text">
                        <h1 class="headline">Experience Luxury <br> and Comfort</h1>
                        <p>Enjoy exceptional service and elegant accomodations.</p>
                    </div>
                    <div class="booking_alert">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning" role="alert">
                                    <div class="alert-warning-message">
                                        <strong>Error!</strong>
                                        {{ $error }}
                                    </div>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            @endforeach
                        @elseif(session('success'))
                            <div class="alert alert-success" role="alert">
                                <div class="alert-success-message">
                                    <strong>Success!</strong>
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="availibility_form_form">
                        <form action="{{ route('hotel.room') }}" method="GET" class="form">
                            <div class="availibility_form">
                                <div class="input-group">
                                    <label for="check_in_date">Check In Date</label>
                                    <input type="datetime-local" class="formControl" id="check_in" name="check_in_date"
                                        min="{{ now('Asia/Kolkata')->format('Y-m-d\TH:i') }}" required>
                                </div>
                                <div class="input-group">
                                    <label for="check_out_date">Check Out Date</label>
                                    <input type="datetime-local" class="formControl" id="check_out" name="check_out_date"
                                        min="{{ now('Asia/Kolkata')->format('Y-m-d\TH:i') }}" required>
                                </div>
                                <div class="input-group">
                                    <label for="adults">Adults</label>
                                    <input type="number" class="formControl" id="adults" name="adults" min="1"
                                        required>
                                </div>
                                <div class="input-group">
                                    <label for="childrens">Childrens</label>
                                    <input type="number" class="formControl" id="childrens" name="childrens" min="0"
                                        required>
                                </div>
                                <div class="input-group">
                                    <label for="rooms">Rooms</label>
                                    <input type="number" class="formControl" id="rooms" name="rooms" value="1"
                                        min="1" required>
                                </div>
                            </div>
                            <button type="submit">
                                Check Availability
                            </button>
                        </form>
                    </div>
                </div>
                <div class="scroll-indicator">
                    <div class="mouse">
                        <div class="wheel"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="featured_room">
            <div class="room_text">
                Featured Room
            </div>
            <div class="room_card">
                @foreach ($rooms as $room)
                    <div class="deluxe_room booking_room">
                        <div class="booking_image">
                            @if ($room->status == 'available')
                                <div class="label {{ $room->status }}">
                                    <i class="fa-regular fa-circle-check"></i>
                                    <p>
                                        {{ ucfirst($room->status) }}
                                    </p>
                                </div>
                            @elseif($room->status == 'booked')
                                <div class="label {{ $room->status }}">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                    <p>
                                        {{ ucfirst($room->status) }}
                                    </p>
                                </div>
                            @else
                                <div class="label {{ $room->status }}">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    <p>
                                        {{ ucfirst($room->status) }}
                                    </p>
                                </div>
                            @endif
                            <div class="guest_label">
                                <i class="ri-information-line"></i>
                                <p>
                                    Max Guest {{ $room->max_guests }}
                                </p>
                            </div>
                            <img src="{{ asset('storage/' . $room->image) }}" alt="">
                        </div>
                        <div class="booking_text">
                            <div class="booking_title">
                                {{ $room->room_name }}
                            </div>
                            <div class="booking_feature">
                                <ul>
                                    <li><i class="ri-wifi-fill"></i>
                                        <p>Free Wi-Fi</p>
                                    </li>
                                    <li><i class="ri-customer-service-2-line"></i>
                                        <p>24x7 Support</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="booking_price">
                                <div class="booking_price_price">
                                    ₹{{ $room->price_per_night }}
                                </div>
                                <div class="booking_price_per_night">
                                    / Night
                                </div>
                            </div>
                            <div class="booking_detail">
                                <a href="{{ route('hotel.room.detail', $room) }}">
                                    <button>
                                        View Detail
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="hotel_feature">
            <div class="feature_text">
                Why Choose Us
            </div>
            <div class="feature_cards">
                <div class="wifi_card card">
                    <div class="icon">
                        <i class="ri-wifi-fill"></i>
                    </div>
                    <div class="feature_icon_text">
                        Free Wi-Fi
                    </div>
                    <div class="icon_text">
                        <p>There are nothing to say Now.</p>
                    </div>
                </div>
                <div class="wifi_card card">
                    <div class="icon">
                        <i class="ri-customer-service-2-line"></i>
                    </div>
                    <div class="feature_icon_text">
                        24x7 Support
                    </div>
                    <div class="icon_text">
                        <p>There are nothing to say Now.</p>
                    </div>
                </div>
                <div class="wifi_card card">
                    <div class="icon">
                        <i class="ri-hotel-line"></i>
                    </div>
                    <div class="feature_icon_text">
                        Luxury Rooms
                    </div>
                    <div class="icon_text">
                        <p>There are nothing to say Now.</p>
                    </div>
                </div>
                <div class="wifi_card card">
                    <div class="icon">
                        <i class="ri-bookmark-line"></i>
                    </div>
                    <div class="feature_icon_text">
                        Best Price Gaurntee
                    </div>
                    <div class="icon_text">
                        <p>There are nothing to say Now.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="amenities">
            <div class="amenities_main_title">
                Our Amenities
            </div>
            <div class="amenities_cards">
                <div class="amenities_card">
                    <div class="amenities_image">
                        <img src="{{ asset('images/amenities.png') }}" alt="">
                    </div>
                    <div class="amenities_text">
                        <div class="amenities_title">
                            Swimming Pool
                        </div>
                        <div class="amenities_text">
                            There is nothing to Say about the swimming pool and nothing is bad there.
                        </div>
                    </div>
                </div>
                <div class="amenities_card">
                    <div class="amenities_image">
                        <img src="{{ asset('images/dinning.png') }}" alt="">
                    </div>
                    <div class="amenities_text">
                        <div class="amenities_title">
                            Clean Diging
                        </div>
                        <div class="amenities_text">
                            There is nothing to Say about the swimming pool and nothing is bad there.
                        </div>
                    </div>
                </div>
                <div class="amenities_card">
                    <div class="amenities_image">
                        <img src="{{ asset('images/fitness.png') }}" alt="">
                    </div>
                    <div class="amenities_text">
                        <div class="amenities_title">
                            Fitness Club
                        </div>
                        <div class="amenities_text">
                            There is nothing to Say about the swimming pool and nothing is bad there.
                        </div>
                    </div>
                </div>
                <div class="amenities_card">
                    <div class="amenities_image">
                        <img src="{{ asset('images/spa.png') }}" alt="">
                    </div>
                    <div class="amenities_text">
                        <div class="amenities_title">
                            SPA & Wellness
                        </div>
                        <div class="amenities_text">
                            There is nothing to Say about the swimming pool and nothing is bad there.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="footer">
            <div class="footer_text">
                Ready to Experience Comfort Like Never Before?
            </div>
            <div class="footer_booking_btn">
                <button>
                    <a href="{{ route('hotel.room') }}">Book Your Stay</a>
                </button>
            </div>
        </div>
    </section>

@endsection
