<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use DB;

class DestinationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $destinations = DB::table('destinations')->get(); 
        return view('backend.destination_list',['destinations'=>$destinations]);
        // return view('backend.destination_list');
    }

    public function add()
    {
        return view('backend.destination_add');
    }

    public function save(Request $request){
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            'description' => ['required'],
           ]);

           $destinations = new Destinations();
           $destinations->title = $request->input('title');
              $destinations->slug = $request->input('slug');
              $destinations->location = $request->input('location');
                $destinations->category = $request->input('category');
                $destinations->description = $request->input('description');
  
           if ($request->hasFile('image')) {
                $image = $request->file('image') ;
                $destinationPath = 'uploads/destinations/'; // upload path
                $destination_image = 'uploads/destinations/'. date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $destination_image);
                $destinations->image = "$destination_image";
            }else {
                $destinations->image = 'uploads/destinations/default.jpg';
            } 
           $destinations->save();
           return redirect('add-destinations')->with('status', 'New Destination Added Sucessfully');
        
    }

 
}