<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    public function home()
    {
        $rooms = Room::orderByRaw("
            CASE status
                WHEN 'available' THEN 1
                WHEN 'booked' THEN 2
                WHEN 'maintenance' THEN 3
                ELSE 4
            END
        ")
        ->limit(3)->get();
        return view('visitor.home', compact('rooms'));
    }

    public function bookingview(Room $room, Request $request)
    {
        return view('visitor.booking', [
            'room' => $room,
            'checkIn' => $request->query('check_in_date'),
            'checkOut' => $request->query('check_out_date'),
        ]);
    }

    public function booking(Request $request, Room $room)
    {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'expected_time' => 'nullable',
            'note' => 'nullable',
        ]);

        Booking::create([
            'room_id' => $room->id,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'expected_time' => $request->expected_time,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Room Booked Succesfully.');
    }

    public function checkAvailibility(Request $request)
    {
        $checkIn = $request->check_in_date;
        $checkOut = $request->check_out_date;

        if (!$checkIn || !$checkOut) {
            $rooms = Room::all();

            return view('visitor.rooms', [
                'rooms' => $rooms,
                'filtered' => false,
            ]);
        }

        $request->validate([
            'check_in_date' => 'required',
            'check_out_date' => 'required|after:check_in_date',
        ]);

        $rooms = Room::whereNotIn('id', function ($query) use ($checkIn, $checkOut) {
            $query->select('room_id')
                ->from('bookings')
                // ->whereIn('status', 'confirmed')
                ->where('check_in_date', '<', $checkOut)
                ->where('check_out_date', '>', $checkIn);
        })->orderByRaw("
                CASE status
                    WHEN 'available' THEN 1
                    WHEN 'booked' THEN 2
                    WHEN 'maintenance' THEN 3
                    ELSE 4
                END
            ")
            ->get();

        return view('visitor.rooms', [
            'rooms' => $rooms,
            'filtered' => true,
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
        ]);
    }

    public function detail(Room $room, Request $request)
    {
        $checkIn = $request->query('check_in_date');
        $checkOut = $request->query('check_out_date');

        if (!$checkIn || !$checkOut) {
            return view('visitor.detail', [
                'room' => $room,
                'filtered' => false,
            ]);
        }

        return view('visitor.detail', [
            'room' => $room,
            'filtered' => true,
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
        ]);
    }
    // public function rooms()
    // {
    //     $rooms = Room::orderByRaw("FIELD(status, 'available', 'booked', 'maintenance')")->get();
    //     return view('visitor.rooms', compact('rooms'));
    // }


    public function index(Request $request)
    {
        $rooms = Room::all();

        if ($request->ajax()) {
            return view('admin.rooms.rooms', compact('rooms'));
        }

        return view('admin.layout.master', [
            'content' => view('admin.rooms.rooms', compact('rooms')),
        ]);
    }


    public function addRooms(Request $request)
    {
        if ($request->ajax()) {
            return view('admin.rooms.addrooms');
        }

        return view('admin.layout.master', [
            'content' => view('admin.rooms.addrooms'),
        ]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'slug' => 'unique:rooms,slug',
            'description' => 'nullable',
            'price_per_night' => 'required|numeric|min:0.01|decimal:0,2',
            'max_guests' => 'required|min:1',
            'bed_type' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:available,booked,maintenance',
        ]);

        $filename = null;
        $slug = Str::slug($request->room_name);

        if ($request->has('image')) {
            $filename = $request->file('image')->store('rooms', 'public');
        }

        Room::create([
            'room_name' => $request->room_name,
            'slug' => $slug,
            'description' => $request->description,
            'price_per_night' => $request->price_per_night,
            'max_guests' => $request->max_guests,
            'bed_type' => $request->bed_type,
            'image' => $filename,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.rooms')->with('success', 'Room Added Successfully');
    }

    public function show(Room $room)
    {
        //
    }

    public function edit(Request $request, Room $room)
    {

        if ($request->ajax()) {
            return view('admin.rooms.updateroom', compact('room'));
        }

        return view('admin.layout.master', [
            'content' => view('admin.rooms.updateroom', compact('room')),
        ]);
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_name' => 'required',
            'description' => 'nullable',
            'price_per_night' => 'required|numeric|min:0.01|decimal:0,2',
            'max_guests' => 'required|min:1',
            'bed_type' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:available,booked,maintenance',
        ]);

        $filename = $room->image;

        if ($request->has('image')) {

            // delete old image
            if ($room->image && Storage::disk('public')->exists($room->image)) {
                Storage::disk('public')->delete($room->image);
            }

            // store new image
            $filename = $request->file('image')->store('rooms', 'public');
        }

        $room->update([
            'room_name' => $request->room_name,
            'description' => $request->description,
            'price_per_night' => $request->price_per_night,
            'max_guests' => $request->max_guests,
            'bed_type' => $request->bed_type,
            'image' => $filename,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.rooms')->with('success', 'Room Update Successfully');
    }

    public function destroy($id)
    {

        $room = Room::findOrFail($id);

        try {
            $room->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Room Data Delete Succesfully',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
