<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Taxi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\TaxiDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TaxiController extends Controller
{
    public function index(TaxiDataTable $dataTable)
    {
        return $dataTable->render('back.taxi.index');
    }

    public function create()
    {
        return view('back.taxi.create');
    }

    public function show($id)
    {
        # code...
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'pick_up_id' => 'required|numeric',
            'drop_off_id' => 'required|numeric',
            'image' => 'required|mimes:png,jpg',
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'from' => 'required|numeric',
        ]);

        // return $request;
        $taxi = new Taxi();
        $taxi->pick_up_id = $request->pick_up_id;
        $taxi->drop_off_id = $request->drop_off_id;
        $taxi->title = $request->title;
        $taxi->slug = Str::slug($taxi->title) . '-' . rand(10, 9999);
        $taxi->sub_title = $request->sub_title;
        $taxi->description = $request->description;
        $taxi->from = $request->from;

        $taxi->google_map = $request->google_map;
        $taxi->features = json_encode($request->features);


        $taxi->image = ImageUpload($request->image, TAXI_PATH, null);

        $taxi->save();

        return redirect()->route('admin.taxi')->with('success', 'Taxi item added successfully');

    }

    public function edit($id)
    {
        $taxi = Taxi::where('id', $id)->firstOrFail();
        return view('back.taxi.edit', compact('taxi'));
    }

    public function update(Request $request, $id)
    {
        $taxi = Taxi::where('id', $id)->firstOrFail();

        $request->validate([
            'pick_up_id' => 'required|numeric',
            'drop_off_id' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg',
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'from' => 'required|numeric',
        ]);

        $taxi->pick_up_id = $request->pick_up_id;
        $taxi->drop_off_id = $request->drop_off_id;
        $taxi->title = $request->title;
        $taxi->slug = Str::slug($taxi->title) . '-' . rand(10, 9999);
        $taxi->sub_title = $request->sub_title;
        $taxi->description = $request->description;
        $taxi->from = $request->from;

        $taxi->google_map = $request->google_map;
        $taxi->features = json_encode($request->features);

        if($request->hasFile('image')) {
            $taxi->image = ImageUpload($request->image, TAXI_PATH, $taxi->image);
        }

        $taxi->save();

        return redirect()->route('admin.taxi')->with('success', 'Taxi item updated successfully');
    }

    public function delete(Request $request)
    {
        $taxi = Taxi::where('id', $request->data_id)->firstOrFail();
        removeImage($taxi->image);
        $taxi->delete();

        return redirect()->route('admin.taxi')->with('success', 'Taxi item removed successfully');
    }
}
