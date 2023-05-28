<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        // return view('backend.dashboard',['booking_count' => $booking_count,'recent_bookings' => $recent_bookings]);
        return view('backend.dashboard');
    }
}
