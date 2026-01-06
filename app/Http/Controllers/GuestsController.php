<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Guests;
use Illuminate\Http\Request;
use App\Models\Room;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function booking(Room $room)
    {
        return view('visitor.booking', compact('room'));
    }


    public function store(Request $request, Room $room)
    {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'expected_time' => 'nullable',
            'note' => 'nullable',
        ]);

        Booking::create([
            'room_id' => $room,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'expected_time' => $request->expected_time,
            'check_in_date' => $request->query('check_in_date'),
            'check_out_date' => $request->query('check_out_date'),
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Room Booked Succesfully.');
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'guest_name' => 'required',
    //         'email' => 'required|unique:guests,email',
    //         'check-in' => 'required|after_or_before:today',
    //         'check-out' => 'required|after:check-in',
    //         'guests' => 'numeric',
    //         'additional_requirment' => 'nullable',
    //     ]);

    //     Guests::create([
    //         'guest_name' => $request->guest_name,
    //         'email' => $request->email,
    //         'check-in' => $request->check_in,
    //         'check-out' => $request->check_out,
    //         'guests' => $request->guests,
    //         'additional_requirment' => $request->additional_requirment,
    //     ]);

    //     return redirect()->route('')->with('success', 'filter Success');
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Guests $guests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guests $guests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guests $guests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guests $guests)
    {
        //
    }
}
