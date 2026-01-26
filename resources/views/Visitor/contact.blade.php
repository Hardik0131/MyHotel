@extends('layout.master')

@section('vite')
    @vite('resources/css/contact.css')
@endsection

@section('content')
    <section>
        <div class="contact_page">
            <div class="contact_page_text">
                Contact Us
            </div>
            <div class="contact_page_small_text">
                We're Here to help you plan a comfortable stay.
            </div>
        </div>
    </section>
    <section class="contact_main_part">
        <div class="first_part">
            <div class="info_section">
                <div class="location_box">
                    <div class="location_icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="location_big_text">
                        Address
                    </div>
                    <div class="location_info">
                        123 Luxury Street, <br> City, India
                    </div>
                </div>
                <div class="phone_box">
                    <div class="phone_icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="phone_big_text">
                        Phone
                    </div>
                    <div class="phone_info">
                        +91 96385 27410
                    </div>
                </div>
                <div class="email_box">
                    <div class="email_icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="email_big_text">
                        Email
                    </div>
                    <div class="email_info">
                        Support@gmail.com
                    </div>
                </div>
            </div>
            <div class="map_section">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d509010.4608965824!2d71.20930710141292!3d21.799603854346298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f51002c521339%3A0xdffd9e40e849ceb0!2sSu-Casa%20Hotel!5e0!3m2!1sen!2sin!4v1768566942207!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        <div class="second_part">
            <div class="contact_form">
                <div class="contact_heading_text">
                    Send Us Message
                </div>
                <div class="alert-messages">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-warning" role="alert">
                                <div class="alert-warning-message">
                                    <strong>Error!</strong>
                                    {{ $error }}
                                </div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="bx bx-x"></i>
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
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <form action="" method="POST" class="mt-3">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="" id="name" name="name" required>
                        <label for="Name">Name</label>
                    </div>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="" id="subject" name="subject">
                        <label for="subject">Subject</label>
                    </div>
                    <div class="input-group">
                        <textarea name="message" id="message" placeholder=" "></textarea>
                        <label for="message">Message</label>
                    </div>
                    <div class="btns">
                        <button type="submit" class="submit-btn">Send</button>
                        <button type="reset" class="reset-btn">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection