@extends('layout/master')

@section('vite')
    @vite('resources/css/rooms.css')
@endsection

@section('content')
    <section>
        <div class="booking_top_part">
            <div class="text_part">
                {{-- <div class="title">
                    Book This Room
                </div> --}}
                <div class="booking_room_detail">
                    There are Rooms For Your Slot
                </div>
                {{-- <div class="booking_room_price_part">
                    <div class="booking_room_price">
                        ₹2999
                    </div>
                    <div class="booking_per_night">
                        / Night
                    </div>
                </div> --}}
                <div class="small_text">
                    Choose Room For Your Comfort.
                </div>
            </div>
            <div class="image_part">
                <img src="{{ asset('images/booking.png') }}" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="rooms_page_card">
            @foreach ($rooms as $room)
                <div class="delux_room rooms_page_booking_room">
                    <div class="rooms_page_booking_image">
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
                        <img src="{{ asset('storage/' . $room->image) }}" alt="">
                    </div>
                    <div class="rooms_page_booking_text">
                        <div class="rooms_page_booking_title">
                            {{ $room->room_name }}
                        </div>
                        <div class="rooms_page_booking_feature">
                            <ul>
                                <li><i class="ri-wifi-fill"></i>
                                    <p>Free Wi-Fi</p>
                                </li>
                                <li><i class="ri-customer-service-2-line"></i>
                                    <p>24x7 Support</p>
                                </li>
                            </ul>
                        </div>
                        <div class="rooms_page_angage_text">
                            Luxury Comfort with city view
                        </div>
                        <div class="rooms_page_booking_price">
                            <div class="rooms_page_booking_price_price">
                                ₹{{ $room->price_per_night }}
                            </div>
                            <div class="rooms_page_booking_price_per_night">
                                / Night
                            </div>
                        </div>
                        <div class="rooms_page_booking_detail">
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
    </section>
@endsection
