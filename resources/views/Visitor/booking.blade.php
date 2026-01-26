@extends('Layout/master')

@section('vite')
    @vite(['resources/css/booking.css', 'resources/js/booking.js'])
@endsection

@section('content')
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
    <section style="margin: 0; padding:0;">
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
    </section>
    <section class="form">
        <form action="{{ route('booking.store', ['room' => $room->slug])}}" method="POST" id="form">
            @csrf
            <div class="input-group">
                <label for="user_name">Full Name <p>*</p></label>
                <input type="text" class="formControl" id="guest_room" placeholder="Enter Your Full Name"
                    name="user_name" autocomplete="off">
            </div>
            <div class="input-group">
                <label for="user_email">Email <p>*</p></label>
                <input type="email" class="formControl" id="user_email" placeholder="Enter Your Email" name="user_email"
                    autocomplete="off">
            </div>
            <input type="hidden" class="formControl" id="check-in" name="check_in_date" autocomplete="off" value="{{ request('check_in_date') }}">
            <input type="hidden" class="formControl" id="check-out" name="check_out_date" autocomplete="off" value="{{ request('check_out_date') }}">
            </div>
            </div>
            <div class="input-group">
                <label for="expected_time">Expected Time of Arival</label>
                <input type="text" class="formControl" id="expected_time" name="expected_time" autocomplete="off">
            </div>
            <div class="input-group">
                <label for="note">Note</label>
                <input type="text" class="formControl" id="note" name="note" autocomplete="off">
            </div>
            <div class="btn">
                <button type="submit">Book Room</button>
                {{-- <a href="{{ route('admin.rooms') }}" data-url="{{ route('admin.rooms') }}" class="return-rooms">Return
                    to rooms page?</a> --}}
            </div>
        </form>
    </section>
@endsection
