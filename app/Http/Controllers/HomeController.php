<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = DB::table('destinations')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();
        $packages = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();
        return view('frontend.home', ['destinations' => $destinations,'packages' => $packages]);
    }

    public function single_destination($slug)
    {
        $destinations = Destinations::where('slug',$slug)->first();
        return view('frontend.destinations.destination', ['destinations' => $destinations]);
    }

    public function all_destinations()
    {
        $destinations = DB::table('destinations')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.destinations.destinations', ['destinations' => $destinations]);
    }
}
