<?php

namespace App\Http\Controllers;

use App\Models\Admin\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function index()
    {
        $about = AboutSection::first();
        return view('back.section.about', compact('about'));
    }

    public function update(Request $request)
    {
        // return $request;

        $about = AboutSection::first();
        if(!$about) {
            $request->validate([
                "title" => "required",
                "description" => "required",
                "image_one" => "required|mimes:png,jpg",
                "image_two" => "required|mimes:png,jpg",
                "image_three" => "required|mimes:png,jpg",
                "facility" => "required",
            ]);

            $about = new AboutSection();
            $about->image_one = ImageUpload($request->image_one, ABOUT_SECTION, null);
            $about->image_two = ImageUpload($request->image_two, ABOUT_SECTION, null);
            $about->image_three = ImageUpload($request->image_three, ABOUT_SECTION, null);

        } else {
            $request->validate([
                "title" => "required",
                "description" => "required",
                "image_one" => "nullable|mimes:png,jpg",
                "image_two" => "nullable|mimes:png,jpg",
                "image_three" => "nullable|mimes:png,jpg",
                "facility" => "required",
            ]);

            if($request->hasFile('image_one')) {
                $about->image_one = ImageUpload($request->image_one, ABOUT_SECTION, $about->image_one);
            }
            if($request->hasFile('image_two')) {
                $about->image_two = ImageUpload($request->image_two, ABOUT_SECTION, $about->image_two);
            }
            if($request->hasFile('image_three')) {
                $about->image_three = ImageUpload($request->image_three, ABOUT_SECTION, $about->image_three);
            }
        }

        $about->title = $request->title;
        $about->description = $request->description;
        $about->facility = json_encode($request->facility);
        $about->save();

        return redirect()->route('admin.section.about')->with('success', 'About section content updated successfully');
    }
}
