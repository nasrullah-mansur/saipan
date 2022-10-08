<?php

namespace App\Http\Controllers;

use App\Models\SendEmail;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function index()
    {
        $email = SendEmail::first();
        return view('back.advance.email', compact('email'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = SendEmail::first();
        if(!$email) {
            $email = new SendEmail();
        }

        $email->email = $request->email;
        $email->save();

        return redirect()->route('sender.email')->with('success', 'Email updated successfully');
    }
}
