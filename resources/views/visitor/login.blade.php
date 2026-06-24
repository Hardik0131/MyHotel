<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
    <title>@yield('title', 'Hotel')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @vite(['resources/js/admin.js'])

</head>

<body>
    <nav class="login_nav">
        <div class="web_logo" id="logo">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <h2>Your <br> Comfort <br> Our <br> Priority</h2>
        </div>
    </nav>
    <div class="login_block" id="login_block">
        <div class="login_img" id="login_img">
            <img src="{{ asset('images/login_block.webp') }}" alt="img__">
        </div>
        <div class="login_form_block" id="login_form_block">
            <div class="login_text" id="login_text">
                <h2>Sign in to Your Account</h2>
                <p>Access Your Hotel Managment Dashboard</p>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert" style="display: flex; justify-content: space-between; align-items: center;">
                    <span><i class="ri-check-line"></i> {{ Session::get('success') }}</span>
                    <i class="ri-close-line close_alert" style="cursor: pointer;" onclick="this.parentElement.style.display='none';"></i>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert" style="display: flex; justify-content: space-between; align-items: center;">
                    <span><i class="ri-error-warning-line"></i> {{ Session::get('error') }}</span>
                    <i class="ri-close-line close_alert" style="cursor: pointer;" onclick="this.parentElement.style.display='none';"></i>
                </div>
            @endif
            <div class="login_form" id="login_form">
                <form action="{{ route('admin.authenticate') }}" class="login_form" id="login_form_form" method="POST">
                    @csrf
                    <div class="form-control">
                        <label for="email">Email Address</label>
                        <div class="input_container">
                            <span><i class="ri-mail-line"></i></span>
                            <input type="email" placeholder="name@example.com" name="email" id="login_email">
                        </div>
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <div class="input_container">
                            <span><i class="ri-lock-line"></i></span>
                            <input type="password" placeholder="Enter your password" name="password" id="login_password">
                            <span class="eye_icon"><i class="ri-eye-line"></i></span>
                        </div>
                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <a href="">Forgot Password ?</a> --}}
                    <button>Log In</button>
                </form>
                <a href="{{ route('hotel.home') }}" class="register_link">Go To Site !</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const eyeIcon = document.querySelector('.eye_icon');
            const passwordInput = document.getElementById('login_password');

            if (eyeIcon && passwordInput) {
                eyeIcon.addEventListener('click', function() {
                    const icon = eyeIcon.querySelector('i');
                    
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('ri-eye-line');
                        icon.classList.add('ri-eye-off-line');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('ri-eye-off-line');
                        icon.classList.add('ri-eye-line');
                    }
                });
            }
        });
    </script>
</body>

</html>
