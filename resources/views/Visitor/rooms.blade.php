@extends('layout.master')

@section('vite')
    @vite('resources/css/rooms.css')
@endsection

@section('content')
    <section>
        <div class="rooms_page">
            <div class="rooms_page_title_text">
                <div class="rooms_page_text">
                    Our Rooms
                </div>
                <div class="room_page_text_two" style="font-size:18px;">
                    @if ($filtered)
                        Available Rooms in {{ $checkIn }} to {{ $checkOut }}
                    @endif
                </div>
                <div class="rooms_page_small_text">
                    Choose the perfect room for your comfortable stay
                </div>
            </div>
            <div class="rooms_page_card">
                @foreach ($rooms as $room)
                    <div class="delux_room rooms_page_booking_room">
                        <div class="rooms_page_booking_image">
                            @if ($filtered)
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
                            @endif
                            <div class="guest_label">
                                <i class="ri-information-line"></i>
                                <p>
                                    Max Guest {{ $room->max_guests }}
                                </p>
                            </div>
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
                                <a
                                    href="{{ route('hotel.room.detail', [
                                        $room,
                                        'check_in_date' => request('check_in_date'),
                                        'check_out_date' => request('check_out_date'),
                                    ]) }}">
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
        <div class="footer">
            <div class="footer_text">
                Ready to Experience Comfort Like Never Before?
            </div>
            <div class="footer_booking_btn">
                <a href="{{ route('hotel.home') }}">
                    <button>Book Your Stay</button>
                </a>
            </div>
        </div>
    </section>
@endsection
