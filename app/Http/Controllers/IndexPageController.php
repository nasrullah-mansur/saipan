<?php

namespace App\Http\Controllers;

use App\Models\Pages\IndexPage;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    public function index()
    {
        $index = IndexPage::first();
        return view('back.pages.index', compact('index'));
    }

    public function update(Request $request)
    {
        $request->validate([
            "taxi_title" => 'required',
            "taxi_description" => 'required',
            "taxi_limit" => 'required|numeric',
            "saipan_title" => 'required',
            "saipan_description" => 'required',
            "saipan_limit" => 'required|numeric',
        ]);

        $index = IndexPage::first();

        if(!$index) {
            $index = new IndexPage();
        }

        $index->taxi_title = $request->taxi_title;
        $index->taxi_description = $request->taxi_description;
        $index->taxi_limit = $request->taxi_limit;
        $index->saipan_title = $request->saipan_title;
        $index->saipan_description = $request->saipan_description;
        $index->saipan_limit = $request->saipan_limit;

        $index->save();

        return redirect()->route('admin.page.index')->with('success', 'Index page info updated successfully');
    }

}
