<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appearance;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function index()
    {
        $app = Appearance::first();
        return view('back.setting.apparance', compact('app'));
    }

    public function update(Request $request)
    {
        $app = Appearance::first();

        if(!$app) {
            $request->validate([
                'title' => 'required',
                'logo' => 'required|mimes:png,jpg',
                'favicon' => 'required|mimes:png,jpg',
            ]);

            $app = new Appearance();
        } else {
            $request->validate([
                'title' => 'required',
                'logo' => 'nullable|mimes:png,jpg',
                'favicon' => 'nullable|mimes:png,jpg',
            ]);
        }

        $app->title = $request->title;
        if($request->hasFile('logo')) {
            if($app) {
                removeImage($app->logo);
            }
            $app->logo = ImageUpload($request->logo, APP_PATH, null);
        }

        if($request->hasFile('favicon')) {
            if($app) {
                removeImage($app->favicon);
            }
            $app->favicon = ImageUpload($request->favicon, APP_PATH, null);
        }

        $app->save();

        return redirect()->route('setting.appearance')->with('success', 'Appearance update successfully');


    }
}
