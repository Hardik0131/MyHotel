<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/js/admin.js'])
</head>

<body>
    @include('admin.layout.sidebar')
    <section class="home-section">
        <div class="admin-nav">
            <div class="profile-icon">
                <i class="bx bx-user main"></i>
            </div>
            <ul class="profile-detail">
                <li>
                    <a href="#">
                        <i class="bx bxs-user user"></i>
                        <span class="">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}">
                        <i class="bx bx-log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <main class="main-content">
            {!! $content ?? '' !!}
        </main>
    </section>
    <script>
        $('#searchRoomsInput').on('keyup', function() {
            let query = $(this).val().trim();

            if(query === '') {
                window.location.href = "{{ route('admin.rooms') }}";
                $("#searchRoomsInput").focus();
                return;
            }

            $.ajax({
                url: "{{ route('admin.rooms.search') }}",
                type: "GET",
                data: {
                    query: query,
                },
                success: function(response) {
                    $('#tableBody').html(response);
                },
            })
        })

        $('#searchInput').on('keyup', function() {
            let query = $(this).val().trim();

            // if(query === '') {
            //     window.location.href = "{{ route('admin.booking') }}";
                
            //     return;
            // }

            $.ajax({
                url: "{{ route('admin.booking.search') }}",
                type: "GET",
                data: {
                    query: query,
                },
                success: function(response) {
                    $('#bookingTableBody').html(response);
                    $("#searchInput").focus();
                },
            })
        })
    </script>
</body>

</html>
