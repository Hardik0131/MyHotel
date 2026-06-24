<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Booking::with('room')->orderBy('id', 'desc')->paginate(5);

        if ($request->ajax()) {
            return view('admin.booking.booking', compact('bookings'));
        }

        return view('admin.layout.master', [
            'content' => view('admin.booking.booking', compact('bookings')),
        ]);
    }

    public function destroy($id)
    {

        $booking = Booking::findOrFail($id);

        try {
            $booking->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Booking Data Delete Succesfully',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function search(Request $request){
        $query = trim($request->input('query'));

        if($query === ''){
            $bookings = Booking::with('room')->orderBy('id', 'desc')->paginate(5)->withQueryString();
        }else{
            $bookings = Booking::where('user_name', 'like', "%{$query}%")->with('room')->orderBy('id', 'desc')->paginate(5)->withQueryString();
        }

        if($request->ajax()){
            return view('admin.layout.row', compact('bookings'))->render();
        }

        return view('admin.layout.master', [
            'content' => view('admin.booking.booking', compact('bookings')),
        ]);
    }
    
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
    public function show(Booking $booking)
    {
        //
    }
}
