<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = FacadesDB::table('destinations')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();
        return view('frontend.home', ['destinations' => $destinations]);
    }
}
