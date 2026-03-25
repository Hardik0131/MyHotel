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
    {{-- @vite(['resources/css/home.css', 'resources/css/nav.css']) --}}
    @vite(['resources/js/visitor.js'])
    {{-- @yield('vite') --}}
    
</head>

<body>
    <style>
        @media (max-width: 800px) {
            #mobileNavMenu {
                position: fixed !important;
                top: 80px !important;
                left: 0 !important;
                right: 0 !important;
                width: 100% !important;
                height: auto !important;
                display: none !important;
                flex-direction: column !important;
                gap: 8px !important;
                padding: 14px !important;
                margin: 0 !important;
                z-index: 999 !important;
                background: #f1f0ff !important;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12) !important;
            }

            #mobileNavMenu.open {
                display: flex !important;
            }

            #mobileNavMenu li,
            #mobileNavMenu li a,
            #admin_login_btn,
            #admin_login_btn button,
            #admin_login_btn button a {
                width: 100% !important;
            }

            #mobileNavMenu li {
                height: auto !important;
                display: block !important;
                align-self: stretch !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            #mobileNavMenu li a {
                justify-content: flex-start !important;
                align-items: center !important;
                padding: 12px 10px !important;
                border-radius: 8px !important;
                font-size: 17px !important;
                font-weight: 500 !important;
                border-bottom: none !important;
            }

            #mobileNavMenu li a.active {
                background: rgba(19, 82, 63, 0.12) !important;
                color: #13523f !important;
                border-left: 3px solid #13523f !important;
                padding-left: 9px !important;
            }

            #admin_login_btn .admin-login-link {
                background: #13523f !important;
                color: #fff !important;
                justify-content: center !important;
                font-weight: 600 !important;
                margin-top: 6px !important;
            }

            #mobileMenuToggle {
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
            }
        }
    </style>

    @include('layout.nav')
    <main style="margin-top: 80px">
        @yield('content')
    </main>
    <script>
        (function() {
            const toggle = document.getElementById('mobileMenuToggle');
            const menu = document.getElementById('mobileNavMenu');

            if (!toggle || !menu) return;

            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                menu.classList.toggle('open');
                toggle.setAttribute('aria-expanded', menu.classList.contains('open') ? 'true' : 'false');
            });

            document.addEventListener('click', function(e) {
                const clickedInside = e.target.closest('.nav_item');
                if (!clickedInside && menu.classList.contains('open')) {
                    menu.classList.remove('open');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 800) {
                    menu.classList.remove('open');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        })();
    </script>
</body>

</html>
