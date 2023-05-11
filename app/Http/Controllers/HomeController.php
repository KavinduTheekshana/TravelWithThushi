<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = FacadesDB::table('destinations')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();
        return view('frontend.home', ['destinations' => $destinations]);
    }

    public function single_destination($slug)
    {
        $destinations = Destinations::where('slug',$slug)->first();
        return view('frontend.destinations.destination', ['destinations' => $destinations]);
    }

    public function all_destinations()
    {
        $destinations = FacadesDB::table('destinations')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.destinations.destinations', ['destinations' => $destinations]);
    }
}
