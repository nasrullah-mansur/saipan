<?php

namespace App\Http\Controllers;

use App\DataTables\DirectContactDataTable;
use App\Models\DirectContact;
use Illuminate\Http\Request;

class DirectContactController extends Controller
{
    public function index(DirectContactDataTable $dataTable)
    {
        return $dataTable->render('back.contact.index');
    }

    public function show($id)
    {
        $mass = DirectContact::where('id', $id)->firstOrFail();
        return view('back.contact.view', compact('mass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'd_name' => 'required|max:555',
            'd_email' => 'required|email',
            'd_phone' => 'required|max:555',
            'subject' => 'required|max:555',
            'message' => 'required'
        ], [
            'd_name.required' => 'The name field is required.',
            'd_email.required' => 'The email field is required.',
            'd_phone.required' => 'The phone field is required.',
        ]);

        $mass = new DirectContact();
        $mass->name = $request->d_name;
        $mass->email = $request->d_email;
        $mass->phone = $request->d_phone;
        $mass->subject = $request->subject;
        $mass->message = $request->message;
        $mass->status = 'Open';
        $mass->save();

        return redirect()->back()->with('success', 'Your massage has been submitted successfully. We will reply or contact you soon.');
    }

    public function update(Request $request)
    {
        $mass = DirectContact::where('id', $request->data_id)->firstOrFail();
        $mass->status = $request->status;
        $mass->save();

        return redirect()->route('contact.index')->with('success', 'Status updated successfully');
    }

    public function delete(Request $request)
    {
        $mass = DirectContact::where('id', $request->data_id)->firstOrFail();
        $mass->delete();
        return redirect()->route('contact.index')->with('success', 'Status removed successfully');
    }
}
