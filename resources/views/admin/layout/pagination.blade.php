@if (request()->routeIs('admin.rooms'))
    {!! $rooms->links('vendor.pagination.bootstrap-5') !!}
@elseif(request()->routeIs('admin.booking'))
    {!! $bookings->links('vendor.pagination.bootstrap-5') !!}
@endif
