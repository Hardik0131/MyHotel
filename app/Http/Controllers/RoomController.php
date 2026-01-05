<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    public function home()
    {
        $rooms = Room::orderByRaw("FIELD(status, 'available', 'booked', 'maintenance')")->limit(3)->get();
        return view('visitor.home', compact('rooms'));
    }

    public function rooms()
    {
        $rooms = Room::orderByRaw("FIELD(status, 'available', 'booked', 'maintenance')")->get();
        return view('visitor.rooms', compact('rooms'));
    }

    public function detail(Room $room){

        return view('visitor.detail', compact('room'));
    }

    public function booking(Room $room){
        return view('visitor.booking', compact('room'));
    }

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
            'image' => 'required',
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

    public function edit(Request $request, $slug)
    {
        $room = Room::findOrFail($slug);

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
            'image' => 'nullable',
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

        try{
            $room->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Room Data Delete Succesfully',
            ]);
        }catch(\Throwable $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }

    }
}
