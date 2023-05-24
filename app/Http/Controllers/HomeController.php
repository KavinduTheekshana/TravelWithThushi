<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = DB::table('destinations')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();
        $packages = DB::table('packages')->where('status', 1)->where('popular_status', 1)->whereNull('deleted_at')->get();
        $gallery = DB::table('galleries')->where('status', 1)->where('popular', 1)->whereNull('deleted_at')->get();
        return view('frontend.home', ['destinations' => $destinations,'packages' => $packages,'gallery' => $gallery]);
    }

    public function about()
    {
        return view('frontend.about.about');
    }

    public function contact()
    {
        return view('frontend.contact.contact');
    }

    public function gallery()
    {
        $gallery = DB::table('galleries')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.gallery.gallery', ['gallery' => $gallery]);
    }

    public function single_destination($slug)
    {
        $destinations = Destinations::where('slug',$slug)->first();
        return view('frontend.destinations.destination', ['destinations' => $destinations]);
    }

    public function single_package($slug)
    {
        $package = Packages::where('slug',$slug)->first();
        $package_list = Packages::where('status',1)->get();
        $package_id = $package->id;
        $package_details = DB::table('package_details')->where('package_id',$package_id)->where('status',1)->whereNull('deleted_at')->orderBy('day', 'asc')->get();
        return view('frontend.packages.package_details', ['package' => $package, 'package_list' => $package_list,'package_details' => $package_details,]);
    }

    public function all_destinations()
    {
        $destinations = DB::table('destinations')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.destinations.destinations', ['destinations' => $destinations]);
    }

    public function all_packages()
    {
        $packages = DB::table('packages')->where('status', 1)->whereNull('deleted_at')->get();
        return view('frontend.packages.packages', ['packages' => $packages]);
    }
}
