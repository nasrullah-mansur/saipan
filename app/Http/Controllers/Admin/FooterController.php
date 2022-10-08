<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();
        return view('back.footer.index', compact('footer'));
    }

    function create(Request $request)
    {
        $footer = Footer::first();

        if(!$footer) {
            $request->validate([
                'image' => 'required|mimes:png,jpg',
                'content' => 'required',
                'copyright' => 'required',
            ]);

            $footer = new Footer();
            $footer->image = ImageUpload($request->image, FOOTER_LOGO, null);
        }

        else {
            $request->validate([
                'image' => 'nullable|mimes:png,jpg',
                'content' => 'required',
                'copyright' => 'required',
            ]);
            if($request->hasFile('image')) {
                $footer->image = ImageUpload($request->image, FOOTER_LOGO, $footer->image);
            }
        }

        $footer->content = $request->content;
        $footer->copyright = $request->copyright;
        $footer->save();

        return redirect()->route('admin.footer')->with('success', 'Footer updated successfully');
    }

}
