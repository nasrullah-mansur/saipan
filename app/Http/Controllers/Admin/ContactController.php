<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('back.section.contact', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::first();
        $request->validate([
            'title' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'location' => 'required',
            'working_hours' => 'required',
        ]);

        if(!$contact) {
            $contact = new Contact();
        }

        $contact->title = $request->title;
        $contact->description = $request->description;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->location = $request->location;
        $contact->working_hours = $request->working_hours;
        $contact->save();

        return redirect()->route('section.contact')->with('success', 'Contact updated successfully');

    }

}
