<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function save(Request $request)
    {
        $this->validate($request, [
            'package_id' => ['required'],
            'package_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'country' => ['required'],
            'checkin' => ['required'],
            'checkout' => ['required'],
        ]);

        $boocking = new Booking();
        $boocking->package_id = $request->input('package_id');
        $boocking->package_name = $request->input('package_name');
        $boocking->name = $request->input('name');
        $boocking->email = $request->input('email');
        $boocking->phone = $request->input('phone');
        $boocking->country = $request->input('country');
        $boocking->checkin = $request->input('checkin');
        $boocking->checkout = $request->input('checkout');

        $boocking->save();
        // return redirect()->back()->with('status', 'Your Inquiry Sent Sucessfully');


        return response()->json(['success' => 'Your Inquiry Sent Sucessfully']);
    }
}
