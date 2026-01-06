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
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->user_name ?: 'N/A' }}</td>
                            <td>{{ $booking->room->room_name ?: 'N/A' }}</td>
                            <td>{{ $booking->user_email ?: 'N/A' }}</td>
                            <td>{{ $booking->check_in_date }}</td>
                            <td>{{ $booking->check_out_date }}</td>
                            <td>{{ $booking->created_at->timezone('Asia/Kolkata')->format('d-m-Y h:i A')  ?: 'N/A'}}</td>
                            <td>{{ $booking->note ?: 'N/A' }}</td>
                            <td id="action_btn">
                                <div class="action_btn">
                                    {{-- <a href="{{ route('admin.booking.edit', $booking) }}"
                                        data-url="{{ route('admin.booking.edit', $booking) }}" class="edit-rooms"><i
                                            class="ri-edit-2-line"></i></a> --}}
                                    <i class="ri-delete-bin-line booking-delete-btn" data-id="{{ $booking->id }}"></i>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
