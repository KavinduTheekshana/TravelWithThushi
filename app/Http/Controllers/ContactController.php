<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'comment' => ['required'],
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->comment = $request->input('comment');

        $contact->save();
        
    
        // Send the email
        $formData = $request->all();
        // Mail::to('kavindutheekshana@gmail.com')->send(new BookingInquiry($formData));

        return response()->json(['success' => 'Your Message Sent Sucessfully']);
    }

}
