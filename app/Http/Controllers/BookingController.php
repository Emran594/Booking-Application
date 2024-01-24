<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request, $id){

        $trip = Trip::with(['bus', 'bus.seats', 'fromLocation', 'toLocation'])
            ->findOrFail($id);

        return view('pages.user.booking', compact('trip'));
    }
}
