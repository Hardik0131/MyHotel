@extends('Layout/master')

@section('title', 'Login')

@section('vite')

    @vite(['resources/css/login.css', 'resources/js/login.js'])

@endsection

@section('content')

    <nav class="login_nav">
        <div class="web_logo" id="logo">
            <img src="images/logo.png" alt="">
            <h2>Your <br> Comfort <br> Our <br> Priority</h2>
        </div>
    </nav>

    <div class="login_block" id="login_block">
        <div class="login_img" id="login_img">
            <img src="images/login_block.webp" alt="img__">
        </div>
        <div class="login_form_block" id="login_form_block">
            <div class="login_text" id="login_text">
                <h2>Sign in to Your Account</h2>
                <p>Access Your Hotel Managment Dashboard</p>
            </div>
            <div class="login_form" id="login_form">
                <form action="" class="form" id="form">
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
                    <a href="">Forgot Password ?</a>
                    <button>Log In</button>
                </form>
                <a href="" class="register_link">Don't Have an Account ? Register Here !</a>
            </div>
        </div>
    </div>

@endsection
