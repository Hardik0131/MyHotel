<div class="rooms-admin-nav">
    <div class="unable-disable-content">
        <div class="roomss sub-nav">
            <div class="text">Rooms</div>
            <div class="roomss_link">
                <i class="bx bxs-info-circle"></i>
                <a href="#">/ Rooms</a>
            </div>
        </div>
        <div class="rooms-content">
            <div class="search-bar">
                <div class="roomss search-box">
                    <input type="search" placeholder="Search Here..." id="searchInput" class="rooms-search"
                        autocomplete="off">
                    <i class="bx bx-search"></i>
                </div>
                <div class="add-new-rooms">
                    <a href="{{ route('admin.rooms.addrooms') }}" data-url="{{ route('admin.rooms.addrooms') }}"
                        class="add-rooms">
                        <button>
                            <i class="bx bx-plus"></i>
                            <div class="add-rooms-text">
                                Add Room
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="rooms-delete-alert">

        </div>
        <div class="roomsTable">
            <table class="table">
                <thead>
                    <tr>
                        <th>Rooms Name</th>
                        <th>Rooms Price</th>
                        <th>Room Image</th>
                        <th>Max Guests</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($rooms as $room)
                        <tr>
                            <td>{{ $room->room_name ?: 'N/A' }}</td>
                            <td>₹{{ $room->price_per_night ?: 'N/A' }}</td>
                            <td>
                                <div class="room_image">
                                    <img src="{{ asset('storage/' . $room->image) }}" alt="">
                                </div>
                            </td>
                            <td>{{ $room->max_guests }}</td>
                            <td class="status_badge {{ $room->status }}">{{ ucfirst($room->status) ?: 'N/A' }}</td>
                            <td id="action_btn">
                                <div class="action_btn">
                                    <a href="{{ route('admin.rooms.edit', $room->id) }}"
                                        data-url="{{ route('admin.rooms.edit', $room->id) }}" class="edit-rooms"><i
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
                </tbody>
            </table>
        </div>
    </div>
</div>
