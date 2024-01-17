<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Location;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function trip(){
        $trips = Trip::with(['fromLocation', 'toLocation', 'bus'])->get();
        $locations = Location::all();
        $buses = Bus::all();
        return view('pages.admin.trip', compact('locations', 'buses','trips'));
    }

    public function storeTrips(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string',
            'from_location' => 'required|exists:locations,id',
            'to_location' => 'required|different:from_location|exists:locations,id',
            'bus_id' => 'required|exists:buss,id',
            'fare' => 'required|string',
            'status' => 'required|string|in:Active,active',
        ]);

        $trip = new Trip($validatedData);

        $trip->save();

        return redirect('/trip')->with('success', 'Trip added successfully');


    }


        public function deleteTrip($id)
        {
            $trip = Trip::find($id);

            if (!$trip) {
                return redirect()->back()->with('error', 'Trip not found!');
            }
            $trip->delete();
            return redirect()->back()->with('success', 'Trip deleted successfully!');
        }





}
