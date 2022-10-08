<?php

namespace App\Http\Controllers;

use App\Models\Pages\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $about = AboutPage::first();
        return view('back.pages.about', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutPage::first();
        if(!$about) {
            $request->validate([
                "taxi_title" => 'required',
                "taxi_description" => 'required',
                "saipan_title" => 'required',
                "saipan_description" => 'required',
                "page_banner_image" => 'required|mimes:png,jpg',
                "taxi_image" => 'required|mimes:png,jpg',
                "saipan_image" => 'required|mimes:png,jpg',
            ]);

            $about = new AboutPage();
            $about->page_banner_image = ImageUpload($request->page_banner_image, ABOUT_PAGE, null);
            $about->taxi_image = ImageUpload($request->taxi_image, ABOUT_PAGE, null);
            $about->saipan_image = ImageUpload($request->saipan_image, ABOUT_PAGE, null);

        } else {
            $request->validate([
                "taxi_title" => 'required',
                "taxi_description" => 'required',
                "saipan_title" => 'required',
                "saipan_description" => 'required',
                "page_banner_image" => 'nullable|mimes:png,jpg',
                "taxi_image" => 'nullable|mimes:png,jpg',
                "saipan_image" => 'nullable|mimes:png,jpg',
            ]);

            if($request->hasFile('page_banner_image')) {
                $about->page_banner_image = ImageUpload($request->page_banner_image, ABOUT_PAGE, $about->page_banner_image);
            }
            if($request->hasFile('taxi_image')) {
                $about->taxi_image = ImageUpload($request->taxi_image, ABOUT_PAGE, $about->taxi_image);
            }
            if($request->hasFile('saipan_image')) {
                $about->saipan_image = ImageUpload($request->saipan_image, ABOUT_PAGE, $about->saipan_image);
            }
        }


        $about->taxi_title = $request->taxi_title;
        $about->taxi_description = $request->taxi_description;
        $about->saipan_title = $request->saipan_title;
        $about->saipan_description = $request->saipan_description;

        $about->save();

        return redirect()->route('admin.page.about')->with('success', 'About page info updated successfully');
        
    }
}
