@extends('layout.master')

{{-- @section('vite')
    @vite('resources/css/contact.css')
@endsection --}}

@section('content')
    <style>
        .contact_main_part {
            max-width: 1200px;
            margin: 0 auto;
        }

        .contact-map-frame {
            width: 100%;
            border: 0;
            display: block;
        }

        .mobile-section-title {
            display: none;
        }

        @media (max-width: 768px) {
            .contact_page {
                padding: 18px 10px !important;
            }

            .contact_page_text {
                font-size: 28px !important;
                line-height: 1.2;
            }

            .contact_page_small_text {
                font-size: 14px !important;
                margin-top: 6px !important;
            }

            .contact_main_part {
                display: flex !important;
                flex-direction: column !important;
                gap: 14px !important;
                padding: 0 10px 18px !important;
            }

            .first_part,
            .second_part {
                width: 100% !important;
            }

            .second_part {
                order: 1 !important;
            }

            .first_part {
                order: 2 !important;
                display: flex !important;
                flex-direction: column !important;
                gap: 12px !important;
            }

            .first_part .info_section {
                order: 1 !important;
            }

            .first_part .map_section {
                order: 2 !important;
            }

            .mobile-section-title {
                display: block;
                font-size: 18px;
                font-weight: 600;
                color: #1f2937;
                margin: 4px 2px 2px;
            }

            .info_section {
                display: grid !important;
                grid-template-columns: 1fr !important;
                gap: 10px !important;
                padding: 0 !important;
                background: transparent !important;
                box-shadow: none !important;
                border-radius: 0 !important;
            }

            .location_box,
            .phone_box,
            .email_box {
                background: #fff !important;
                border-radius: 10px !important;
                padding: 14px 12px !important;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08) !important;
                border: 1px solid rgba(0, 0, 0, 0.05) !important;
            }

            .location_big_text,
            .phone_big_text,
            .email_big_text {
                font-size: 18px !important;
            }

            .location_info,
            .phone_info,
            .email_info {
                font-size: 14px !important;
                line-height: 1.5;
            }

            .map_section {
                margin-bottom: 0 !important;
                padding: 8px !important;
                border-radius: 10px !important;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.14) !important;
            }

            .map_section .contact-map-frame {
                min-height: 210px !important;
                border-radius: 8px !important;
            }

            .contact_form {
                padding: 14px !important;
                border-radius: 12px !important;
                box-shadow: 0 6px 14px rgba(0, 0, 0, 0.16) !important;
            }

            .contact_heading_text {
                font-size: 22px !important;
                margin-bottom: 8px !important;
            }

            .form_group {
                margin: 12px 0 !important;
            }

            .form_group input,
            .form_group textarea {
                font-size: 15px !important;
                border-radius: 8px !important;
                padding: 10px 12px !important;
                color: #1e1e1e !important;
            }

            .form_group textarea {
                min-height: 120px !important;
            }

            .form_group label {
                left: 12px !important;
                font-size: 15px !important;
            }

            .btns {
                display: grid !important;
                grid-template-columns: 1fr !important;
                gap: 10px !important;
            }

            .submit-btn,
            .reset-btn {
                width: 100% !important;
                min-width: 100% !important;
                font-size: 16px !important;
                border-radius: 10px !important;
                padding: 11px !important;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15) !important;
            }
        }
    </style>

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
            <div class="mobile-section-title">Contact Details</div>
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
            <div class="mobile-section-title">Location Map</div>
            <div class="map_section">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d509010.4608965824!2d71.20930710141292!3d21.799603854346298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f51002c521339%3A0xdffd9e40e849ceb0!2sSu-Casa%20Hotel!5e0!3m2!1sen!2sin!4v1768566942207!5m2!1sen!2sin"
                    class="contact-map-frame" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        <div class="second_part">
            <div class="contact_form">
                <div class="mobile-section-title">Contact Form</div>
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
                <form action="" method="POST" class="mt-3" id="contact_form">
                    @csrf
                    <div class="form_group">
                        <input type="text" class="form-control" placeholder="" id="name" name="name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form_group">
                        <input type="email" class="form-control" placeholder="" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form_group">
                        <input type="text" class="form-control" placeholder="" id="subject" name="subject">
                        <label for="subject">Subject</label>
                    </div>
                    <div class="form_group">
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