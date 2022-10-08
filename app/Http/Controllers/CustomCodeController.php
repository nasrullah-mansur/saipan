<?php

namespace App\Http\Controllers;

use App\Models\CustomCode;
use Illuminate\Http\Request;

class CustomCodeController extends Controller
{
    public function css()
    {
        $code = CustomCode::first();
        return view('back.advance.css', compact('code'));
    }

    public function css_update(Request $request)
    {
        $code = CustomCode::first();
        if(!$code) {
            $code = new CustomCode();
        } 

        $code->css = $request->css;
        $code->save();

        return redirect()->route('custom.css')->with('success', 'Custom CSS added successfully');
    }


    public function js()
    {
        $code = CustomCode::first();
        return view('back.advance.js', compact('code'));
    }

    public function js_update(Request $request)
    {
        
        $code = CustomCode::first();
        if(!$code) {
            $code = new CustomCode();
        } 

        $code->js = $request->js;
        $code->save();

        return redirect()->route('custom.js')->with('success', 'Custom JS added successfully');
    }
}
