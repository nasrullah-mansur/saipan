<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('back.slider.index');
    }

    public function create()
    {
        return view('back.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg',
            'header' => 'required',
            'content' => 'required',
            'btn' => 'required'
        ]);

        $slider = new Slider();
        $slider->image = ImageUpload($request->image, SLIDER_PATH, null);
        $slider->header = $request->header;
        $slider->content = $request->content;
        $slider->btn = $request->btn;
        $slider->save();

        return redirect()->route('admin.slider')->with('success', 'Slider item added successfully');

    }

    public function edit($id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();
        return view('back.slider.edit', compact('slider'));
    }

    function update(Request $request, $id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();

        $request->validate([
            'image' => 'nullable',
            'header' => 'required',
            'content' => 'required',
            'btn' => 'required'
        ]);

        if($request->hasFile('image')) {
            $slider->image = ImageUpload($request->image, SLIDER_PATH, null);
        }

        $slider->header = $request->header;
        $slider->content = $request->content;
        $slider->btn = $request->btn;
        $slider->save();

        return redirect()->route('admin.slider')->with('success', 'Slider item updated successfully');
    }

    public function delete(Request $request)
    {
        $slider = Slider::where('id', $request->id)->firstOrFail();

        removeImage($slider->image);
        $slider->delete();

        return redirect()->route('admin.slider')->with('success', 'Slider item removed successfully');

    }
}
