@extends('Layout/master')

@section('vite')
    @vite('resources/css/details.css')
@endsection

@section('content')
    @include('Layout/nav')

    <section>
        <div class="detail_page">
            <div class="room_detail_image">
                {{-- @if ($room->status == 'available')
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
                @endif --}}
                <img src="{{ asset('storage/' . $room->image) }}" alt="">
            </div>
            <div class="room_detail_name">
                {{ $room->room_name }} Room
            </div>
            <div class="room_detail">
                <div class="info_part">
                    <div class="detail_page_about_price">
                        <div class="detail_room_price">
                            ₹{{ $room->price_per_night }}
                        </div>
                        <div class="detail_per_night">
                            / night
                        </div>
                    </div>
                    <div class="detail_page_feature">
                        <ul>
                            <li><i class="ri-wifi-fill"></i>
                                <p>Free Wi-Fi</p>
                            </li>
                            <li><i class="ri-group-line"></i>
                                <p>{{ $room->max_guests }} Guests</p>
                            </li>
                            <li><i class="ri-hotel-bed-line"></i>
                                <p>{{ $room->bed_type }} Bed</p>
                            </li>
                            <li><i class="ri-restaurant-line"></i>
                                <p>BreakFast</p>
                            </li>
                            <li><i class="ri-customer-service-2-line"></i>
                                <p>24x7 Support</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="booking_part">
                    <div class="book_this_room">
                        Book This Room
                    </div>
                    <div class="booking_detail_page_about_price">
                        <div class="booking_detail_room_price">
                            ₹{{ $room->price_per_night }}
                        </div>
                        <div class="detail_per_night">
                            / night
                        </div>
                    </div>
                    <div class="detail_page_book_now {{ $room->status }}">
                        @if ($filtered)
                            <a href="{{ route('hotel.room.booking', [
                                    'room' => $room->slug,
                                    'check_in_date' => request('check_in_date'),
                                    'check_out_date' => request('check_out_date'),
                                ]) }}">
                                @if ($room->status == 'booked')
                                    <button class="book_btn" disabled>Book Now</button>
                                @elseif($room->status == 'maintenance')
                                    <button class="book_btn" disabled>Book Now</button>
                                @else
                                    <button class="book_btn">Book Now</button>
                                @endif
                            </a>
                            @if ($room->status == 'booked')
                                <span class="tooltip">This room is not available. It's is Booked.</span>
                            @elseif($room->status == 'maintenance')
                                <span class="tooltip">This room is not available due to maintenance.</span>
                            @endif
                        @else
                            <a href="{{ route('hotel.home') }}">
                                <button class="check_avail">Check Availability</button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="detail_room_text">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit est sed, officia, incidunt odio ipsum quidem
                quam dolores quis nesciunt veniam neque beatae, unde tempora magni aliquam culpa! Eos, possimus.
            </div>
        </div>
    </section>
    <section>
        <div class="detail_page_amenities">
            <div class="detail_amenities_title">
                Amenities
            </div>
            <div class="detail_amenities_info">
                <div class="amenities_parts">
                    <i class="ri-check-line"></i>
                    <div class="amenities_parts_text">
                        Free Wi-Fi
                    </div>
                </div>
                <div class="amenities_parts">
                    <i class="ri-check-line"></i>
                    <div class="amenities_parts_text">
                        Free Wi-Fi
                    </div>
                </div>
                <div class="amenities_parts">
                    <i class="ri-check-line"></i>
                    <div class="amenities_parts_text">
                        Free Wi-Fi
                    </div>
                </div>
                <div class="amenities_parts">
                    <i class="ri-check-line"></i>
                    <div class="amenities_parts_text">
                        Free Wi-Fi
                    </div>
                </div>
                <div class="amenities_parts">
                    <i class="ri-close-line"></i>
                    <div class="amenities_parts_text">
                        Free Wi-Fi
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
