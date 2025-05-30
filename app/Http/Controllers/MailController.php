<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Contact;
//use Illuminate\Http\Request;
//use Mail;
//
//class MailController extends Controller
//{
//    public function sendMail(Request $request)
//    {
//        try {
//            $validated = $request->validate([
//                'name' => 'required|string|max:255',
//                'email' => 'required|email|max:255',
//                'message' => 'required|string',
//            ]);
//            Contact::create($validated);
//            $mailData = [
//                'title' => 'New Contact Form Submission',
//                'name' => $validated['name'],
//                'email' => $validated['email'],
//                'body' => $validated['message'],
//            ];
//
//            Mail::send('emails.sentMail', ['mailData' => $mailData], function ($message) use ($validated) {
//                $message->to('outhkimoun@gmail.com', 'Admin')
//                    ->cc('ccemail@example.com')
//                    ->subject('New Contact Form Submission from ' . $validated['name']);
//            });
//
//            Mail::send('emails.confirmationMail', ['mailData' => $mailData], function ($message) use ($validated) {
//                $message->to($validated['email'], $validated['name'])
//                    ->subject('Thank you for contacting us');
//            });
//
//            return response()->json(['message' => 'Email sent successfully']);
//        } catch (\Exception $e) {
//            return response()->json([
//                'error' => true,
//                'message' => $e->getMessage(),
//                'trace' => $e->getTraceAsString(),
//            ], 500);
//        }
//    }
//}


namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string',
            ]);

            // Save contact form data
            Contact::create($validated);

            $mailData = [
                'title' => 'New Contact Form Submission',
                'name' => $validated['name'],
                'email' => $validated['email'],
                'body' => $validated['message'],
            ];

            Mail::send('emails.sentMail', ['mailData' => $mailData], function ($message) use ($validated) {
                $message->to(env('MAIL_USERNAME'))
                    ->cc(env('MAIL_CC_ADDRESS'))
                    ->subject('New Contact Form Submission from ' . $validated['name'])
                    ->replyTo($validated['email'], $validated['name']);
            });

            Mail::send('emails.confirmationMail', ['mailData' => $mailData], function ($message) use ($validated) {
                $message->to($validated['email'], $validated['name'])
                    ->subject('Thank you for contacting us');
            });

            return response()->json(['message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }
}
