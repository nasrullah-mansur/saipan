<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Admin\Saipan;
use Illuminate\Http\Request;
use App\DataTables\SaipanDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SaipanController extends Controller
{
    public function index(SaipanDataTable $dataTable)
    {
        return $dataTable->render('back.saipan.index');
    }

    public function create()
    {
        return view('back.saipan.create');
    }

    public function show($id)
    {
        # code...
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'image' => 'required|mimes:png,jpg',
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'from' => 'required|numeric',
        ]);

        // return $request;
        $saipan = new Saipan();
        $saipan->title = $request->title;
        $saipan->slug = Str::slug($saipan->title) . '-' . rand(10, 9999);
        $saipan->sub_title = $request->sub_title;
        $saipan->description = $request->description;
        $saipan->from = $request->from;

        $saipan->google_map = $request->google_map;
        $saipan->features = json_encode($request->features);


        $saipan->image = ImageUpload($request->image, SAIPAN_PATH, null);

        $saipan->save();

        return redirect()->route('admin.saipan')->with('success', 'Saipan item added successfully');

    }

    public function edit($id)
    {
        $saipan = Saipan::where('id', $id)->firstOrFail();
        return view('back.saipan.edit', compact('saipan'));
    }

    public function update(Request $request, $id)
    {
        $saipan = Saipan::where('id', $id)->firstOrFail();

        $request->validate([
            'image' => 'nullable|mimes:png,jpg',
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'from' => 'required|numeric',
        ]);

        $saipan->title = $request->title;
        $saipan->slug = Str::slug($saipan->title) . '-' . rand(10, 9999);
        $saipan->sub_title = $request->sub_title;
        $saipan->description = $request->description;
        $saipan->from = $request->from;

        $saipan->google_map = $request->google_map;
        $saipan->features = json_encode($request->features);

        if($request->hasFile('image')) {
            $saipan->image = ImageUpload($request->image, SAIPAN_PATH, $saipan->image);
        }

        $saipan->save();

        return redirect()->route('admin.saipan')->with('success', 'Saipan item updated successfully');
    }

    public function delete(Request $request)
    {
        $saipan = Saipan::where('id', $request->data_id)->firstOrFail();
        removeImage($saipan->image);
        $saipan->delete();

        return redirect()->route('admin.saipan')->with('success', 'Saipan item removed successfully');
    }
}
