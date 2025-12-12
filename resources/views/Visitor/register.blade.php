@extends('Layout/master')

@section('title', 'Register')

@section('vite')

    @vite(['resources/css/register.css', 'resources/js/register.js']);

@endsection

@section('content')

    <nav class="register_nav">
        <div class="web_logo" id="logo">
            <img src="images/logo.png" alt="">
            <h2>Your <br> Comfort <br> Our <br> Priority</h2>
        </div>
    </nav>

    <div class="register_block" id="register_block">
        <div class="register_img" id="register_img">
            <img src="images/login_block.webp" alt="img__">
        </div>
        <div class="register_form_block" id="register_form_block">
            <div class="register_text" id="register_text">
                <h2>Register into out Site</h2>
                <p>Access your account</p>
            </div>
            <div class="register_form" id="register_form">
                <form action="" class="form" id="form">
                    <div class="form-control">
                        <label for="name">Name</label>
                        <div class="input_container">
                            <i class="ri-user-line"></i>
                            <input type="text" placeholder="Enter Your Name">
                        </div>
                    </div>
                    <div class="form-control">
                        <label for="email">Email Address</label>
                        <div class="input_container">
                            <span><i class="ri-mail-line"></i></span>
                            <input type="email" placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <div class="input_container">
                            <span><i class="ri-lock-line"></i></span>
                            <input type="password" placeholder="Enter your password">
                            <span class="eye_icon"><i class="ri-eye-line"></i></span>
                        </div>
                    </div>
                    {{-- <a href="">Forgot Password ?</a> --}}
                    <button>Registration</button>
                </form>
                <a href="" class="register_link">Already have a account? Login here!</a>
            </div>
        </div>
    </div>

@endsection
