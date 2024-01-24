<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request, $id)
    {
        $user_id=$request->header('id');
        $trip = Trip::with(['bus', 'bus.seats', 'fromLocation', 'toLocation'])
            ->findOrFail($id);

        return view('pages.user.booking', compact('trip', 'user_id'));
    }


    public function storeBooking(Request $request)
    {
        // Validate the form data
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'user_id' => 'required|exists:users,id',
            'selected_seats' => 'required|array',
            'total_fare' => 'required|numeric',
        ]);

        // Retrieve data from the form
        $tripId = $request->input('trip_id');
        $userId = $request->input('user_id');
        $selectedSeats = $request->input('selected_seats');
        $totalFare = $request->input('total_fare');

        // Update the seat status to "booked"
        Seat::whereIn('id', $selectedSeats)->update(['status' => 'booked']);

        // Create a new Booking model and save it
        $booking = new Booking([
            'user_id' => $userId,
            'trip_id' => $tripId,
            'booked_seats' => json_encode($selectedSeats),
            'total_amount' => $totalFare,
        ]);
        $booking->save();

        // Redirect or return a response
        return redirect('/booking-history')->with('success', 'Booking confirmed successfully!');
    }


    public function history(Request $request){
        // Get the current authenticated user
        $user_id=$request->header('id');

        // Retrieve booking history for the user
        $bookings = Booking::where('user_id', $user_id)->get();

        return view('pages.user.history', compact('bookings'));

    }

}
