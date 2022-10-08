<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::first();
        return view('back.header.index', compact('header'));
    }

    public function create(Request $request)
    {
        $header = Header::first();

        if(!$header) {
            $header = new Header();
        }

        $header->opening_hours = $request->opening_hours;
        $header->status = $request->status;
        $header->save();

        return redirect()->route('admin.header')->with('success', 'Header updated successfully');
    }
}
