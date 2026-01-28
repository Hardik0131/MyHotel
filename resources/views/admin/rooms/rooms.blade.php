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
                    <a href="{{ route('admin.rooms.addrooms') }}"
                        data-url="{{ route('admin.rooms.addrooms', [], false) }}" class="add-rooms">
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
                    @include('admin.layout.row')
                </tbody>
            </table>
        </div>
    </div>
</div>
