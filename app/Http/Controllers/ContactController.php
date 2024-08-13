<?php
// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Handle the form submission, e.g., send an email
        Mail::send([], [], function ($message) use ($request) {
            $message->to('your-email@example.com')
                ->subject('Contact Form Submission')
                ->from($request->email, $request->name)
                ->setBody($request->message, 'text/html');
        });

        return back()->with('success', 'Thank you for contacting us!');
    }
}