@extends('Layout/master')

@section('vite')
    @vite('resources/css/booking.css')
@endsection

@section('content')
    @include('Layout/nav')
    <section id="booking_top_part">
        <div class="booking_top_part">
            <div class="text_part">
                {{-- <div class="title">
                    Book This Room
                </div> --}}
                <div class="booking_room_detail">
                    Book Room For Your Comfort
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
                    Fill This Form to Book Your Stay.
                </div>
            </div>
            <div class="image_part">
                <img src="{{ asset('images/booking.png') }}" alt="">
            </div>
        </div>
    </section>
    <section class="form">
        <form action="" id="form">
            @csrf
            <div class="input-group">
                <label for="guest_name">Full Name</label>
                <input type="text" class="formControl" id="guest_room" placeholder="Enter Your Full Name"
                    name="guest_name" autocomplete="off">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" class="formControl" id="email" placeholder="Enter Your Email" name="email"
                    autocomplete="off">
            </div>
            <div class="dates">
                <div class="input-group">
                    <label for="check-in">Check-In Date</label>
                    <input type="date" class="formControl" id="check-in" name="check-in" autocomplete="off"
                        min="2026-01-03">
                </div>
                <div class="input-group">
                    <label for="check-out">Check-Out Date</label>
                    <input type="date" class="formControl" id="check-out" name="check-out" autocomplete="off">
                </div>
            </div>
            <div class="input-group">
                <label for="guests">Total Guests</label>
                <input type="number" class="formControl" id="guests" name="check-out" autocomplete="off" min="1">
            </div>
            <div class="input-group">
                <label for="additional_requirment">Additional Request</label>
                <input type="text" class="formControl" id="additional_requirment" name="additional_requirment"
                    autocomplete="off" placeholder="E.x : Extra Pillow">
            </div>
            {{-- <div class="btn">
                <button type="submit">Find Room</button>
                <a href="{{ route('admin.rooms') }}" data-url="{{ route('admin.rooms') }}" class="return-rooms">Return
                    to rooms page?</a>
            </div> --}}
        </form>
    </section>
@endsection
