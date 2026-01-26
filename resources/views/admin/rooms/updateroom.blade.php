<div class="rooms-admin-nav">
    <div class="rooms_form">
        <div class="add_rooms_text">
            <h2>Update Rooms</h2>
        </div>
        <div class="alert_message">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error message">
                        <h2><strong>Error !</strong>{{ $error }}</h2>
                        <i class="bx bx-x"></i>
                    </div>
                @endforeach
            @elseif(session('success'))
                <div class="success">
                    <h2><strong>Success</strong>{{ session('success') }}</h2>
                    <i class="bx bx-x"></i>
                </div>
            @endif
        </div>
        <form action="{{ route('admin.rooms.update', $room) }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group">
                <label for="room_name">Rooms Name</label>
                <input type="text" class="formControl" id="room_name" placeholder="Enter Rooms Name" name="room_name"
                    autocomplete="off" value="{{ $room->room_name }}" required>
            </div>
            <div class="input-group">
                <label for="price_per_night">Rooms Price Per Night</label>
                <input type="number" class="formControl" id="price_per_night" name="price_per_night"
                    placeholder="Enter Price Per Night" autocomplete="off" min="1" step="0.01" value="{{ $room->price_per_night }}">
            </div>
            <div class="input-group">
                <label for="max_guests">Maximum Guests</label>
                <input type="number" class="formControl" id="max_guests" name="max_guests"
                    placeholder="Maximum Guests Allowed" autocomplete="off" min="1" value="{{ $room->max_guests }}">
            </div>
            <div class="input-group">
                <label for="bed_type">Bed Type</label>
                <input type="text" class="formControl" id="bed_type" name="bed_type" placeholder="Bed Type"
                    autocomplete="off" value="{{ $room->bed_type }}">
            </div>
            <div class="input-group">
                <label for="image">Room Image</label>
                <input type="file" class="formControl" id="image" name="image" placeholder="Choose Image"
                    autocomplete="off">
            </div>
            <div class="input_group">
                <label for="status">Status Of Room</label>
                <div class="select-wrapper">
                    <select name="status" id="select_product" required>
                        <option value="" id="default" disabled selected hidden>-- Select Status --</option>
                        <option value="available">Available</option>
                        <option value="booked">Booked</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>
            </div>
            <div class="btn">
                <button type="submit">Update rooms</button>
                <a href="{{ route('admin.rooms') }}" data-url="{{ route('admin.rooms', [], false) }}" class="return-rooms">Return
                    to rooms page?</a>
            </div>
        </form>
    </div>
</div>
