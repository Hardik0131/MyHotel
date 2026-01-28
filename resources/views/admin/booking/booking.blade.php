<div class="booking-admin-nav">
    <div class="unable-disable-content">
        <div class="bookings sub-nav">
            <div class="text">Booking</div>
            <div class="bookings_link">
                <i class="bx bxs-info-circle"></i>
                <a href="#">/ Booking</a>
            </div>
        </div>
        <div class="booking-content">
            <div class="search-bar">
                <div class="bookings search-box">
                    <input type="search" placeholder="Search Here..." id="searchInput" class="booking-search"
                        autocomplete="off">
                    <i class="bx bx-search"></i>
                </div>
                {{-- <div class="add-new-booking">
                    <a href="{{ route('admin.booking.addbooking') }}" data-url="{{ route('admin.booking.addbooking') }}"
                        class="add-booking">
                        <button>
                            <i class="bx bx-plus"></i>
                            <div class="add-booking-text">
                                Add Room
                            </div>
                        </button>
                    </a>
                </div> --}}
            </div>
        </div>
        <div class="booking-delete-alert">

        </div>
        <div class="bookingTable">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Room Name</th>
                        <th>User Email</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Booking Time</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @include('admin.layout.row')
                </tbody>
            </table>
        </div>
    </div>
</div>
