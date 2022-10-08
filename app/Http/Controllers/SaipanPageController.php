<?php

namespace App\Http\Controllers;

use App\Models\Pages\SaipanPage;
use Illuminate\Http\Request;

class SaipanPageController extends Controller
{
    public function index()
    {
        $saipan = SaipanPage::first();
        return view('back.pages.saipan', compact('saipan'));
    }

    public function update(Request $request)
    {
        
        $saipan = SaipanPage::first();
        if(!$saipan) {
            $request->validate([
                "saipan_title" => "required",
                "saipan_description" => "required",
                "saipan_limit" => "required|numeric",
                "page_banner_image" => "required|mimes:png,jpg",
            ]);
            $saipan = new SaipanPage();
            $saipan->page_banner_image = ImageUpload($request->page_banner_image, SAIPAN_PAGE, null);
        } else {
            $request->validate([
                "saipan_title" => "required",
                "saipan_description" => "required",
                "saipan_limit" => "required|numeric",
                "page_banner_image" => "nullable|mimes:png,jpg",
            ]);

            if($request->hasFile('page_banner_image')) {
                $saipan->page_banner_image = ImageUpload($request->page_banner_image, SAIPAN_PAGE, $saipan->page_banner_image);
            }
        }

        $saipan->saipan_title = $request->saipan_title;
        $saipan->saipan_description = $request->saipan_description;
        $saipan->saipan_limit = $request->saipan_limit;
        $saipan->save();

        return redirect()->route('admin.page.saipan')->with('success', 'Saipan page info updated successfully');
    }
}
