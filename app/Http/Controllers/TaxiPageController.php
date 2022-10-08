<?php

namespace App\Http\Controllers;

use App\Models\Pages\TaxiPage;
use Illuminate\Http\Request;

class TaxiPageController extends Controller
{
    public function index()
    {
        $taxi = TaxiPage::first();
        return view('back.pages.taxi', compact('taxi'));
    }

    public function update(Request $request)
    {
        $taxi = TaxiPage::first();
        if(!$taxi) {
            $request->validate([
                "taxi_title" => "required",
                "taxi_description" => "required",
                "taxi_limit" => "required|numeric",
                "page_banner_image" => "required|mimes:png,jpg",
            ]);
            $taxi = new TaxiPage();
            $taxi->page_banner_image = ImageUpload($request->page_banner_image, TAXI_PAGE, null);
        } else {
            $request->validate([
                "taxi_title" => "required",
                "taxi_description" => "required",
                "taxi_limit" => "required|numeric",
                "page_banner_image" => "nullable|mimes:png,jpg",
            ]);

            if($request->hasFile('page_banner_image')) {
                $taxi->page_banner_image = ImageUpload($request->page_banner_image, TAXI_PAGE, $taxi->page_banner_image);
            }
        }

        $taxi->taxi_title = $request->taxi_title;
        $taxi->taxi_description = $request->taxi_description;
        $taxi->taxi_limit = $request->taxi_limit;
        $taxi->save();

        return redirect()->route('admin.page.taxi')->with('success', 'Taxi page info updated successfully');
    }
}
