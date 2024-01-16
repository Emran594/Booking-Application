<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    public function trip(){
        return view('pages.admin.trip');
    }
}
