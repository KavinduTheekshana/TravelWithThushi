<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $packages = DB::table('packages')->whereNull('deleted_at')->get();
        return view('backend.pages.packages.package_list', ['packages' => $packages]);
    }

    public function add()
    {
        return view('backend.pages.packages.package_add');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'days' => ['required', 'numeric', 'max:255'],
            'nights' => ['required', 'numeric', 'max:255'],
            'image' => ['required'],
            'description' => ['required'],
        ]);

        $package = new Packages();
        $package->title = $request->input('title');
        $package->slug = $request->input('slug');
        $package->location = $request->input('location');
        $package->days = $request->input('days');
        $package->nights = $request->input('nights');
        $package->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $packagePath = 'uploads/packages/'; // upload path
            $package_image = 'uploads/packages/' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($packagePath, $package_image);
            $package->image = "$package_image";
        } else {
            $package->image = 'uploads/destinations/default.jpg';
        }
        $package->save();
        return redirect('add-package')->with('status', 'New package Added Sucessfully');
    }
   
}
