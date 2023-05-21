<?php

namespace App\Http\Controllers;

use App\Mail\BookingInquiry;
use App\Mail\FormSubmissionMail;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

        $booking = new Booking();
        $booking->package_id = $request->input('package_id');
        $booking->package_name = $request->input('package_name');
        $booking->name = $request->input('name');
        $booking->email = $request->input('email');
        $booking->phone = $request->input('phone');
        $booking->country = $request->input('country');
        $booking->checkin = $request->input('checkin');
        $booking->checkout = $request->input('checkout');

        $booking->save();
        
    
        // Send the email
        $formData = $request->all();
        Mail::to('kavindutheekshana@gmail.com')->send(new BookingInquiry($formData));



        return response()->json(['success' => 'Your Inquiry Sent Sucessfully']);
    }
}
