@if (request()->routeIs('admin.rooms') || request()->routeIs('admin.rooms.search'))

    @forelse($rooms as $room)
        <tr>
            <td>{{ $room->room_name ?: 'N/A' }}</td>
            <td>₹{{ $room->price_per_night ?: 'N/A' }}</td>
            <td>
                <div class="room_image">
                    <img src="{{ $room->image }}" alt="Room Image">
                </div>
            </td>
            <td>{{ $room->max_guests }}</td>
            <td class="status_badge {{ $room->status }}">{{ ucfirst($room->status) ?: 'N/A' }}</td>
            <td id="action_btn">
                <div class="action_btn">
                    <a href="{{ route('admin.rooms.edit', $room) }}"
                        data-url="{{ route('admin.rooms.edit', $room, [], false) }}" class="edit-rooms"><i
                            class="ri-edit-2-line"></i></a>
                    <i class="ri-delete-bin-line rooms-delete-btn" data-id="{{ $room->id }}"></i>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No Record Found</td>
        </tr>
    @endforelse
@elseif (request()->routeIs('admin.booking'))
    @forelse($bookings as $booking)
        <tr>
            <td>{{ $booking->user_name ?: 'N/A' }}</td>
            <td>{{ $booking->room->room_name ?: 'N/A' }}</td>
            <td>{{ $booking->user_email ?: 'N/A' }}</td>
            <td>{{ $booking->check_in_date }}</td>
            <td>{{ $booking->check_out_date }}</td>
            <td>{{ $booking->created_at->timezone('Asia/Kolkata')->format('d-m-Y h:i A') ?: 'N/A' }}</td>
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
            <td colspan="100" class="text-center">No Record Found</td>
        </tr>
    @endforelse
@endif
<tr>
    <td colspan="100">
        <div class="pagination-wrapper">
            @include('admin.layout.pagination')
        </div>
    </td>
</tr>
