<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        // Capture the data
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Process the data (e.g., validation, sending email)

        return back()->with('success', 'Thank you for your message!');
    }
}
