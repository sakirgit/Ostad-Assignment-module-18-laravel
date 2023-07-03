<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        
        // Process the form submission
        // Send an email with the submitted data
        Mail::to('your-email@example.com')->send(new ContactFormMail($validatedData));

        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
