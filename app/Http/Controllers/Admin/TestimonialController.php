<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\TestimonialSection;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(TestimonialDataTable $dataTable)
    {
        return $dataTable->render('back.testimonial.index');
    }

    public function create()
    {
        return view('back.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'occupation' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->occupation = $request->occupation;
        $testimonial->content = $request->content;
        $testimonial->image = ImageUpload($request->image, TESTIMONIAL, null);
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial item added successfully');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::where('id', $id)->firstOrFail();
        return view('back.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'occupation' => 'required',
            'content' => 'required',
            'image' => 'nullable|mimes:png,jpg',
        ]);

        $testimonial = Testimonial::where('id', $id)->firstOrFail();
        $testimonial->name = $request->name;
        $testimonial->occupation = $request->occupation;
        $testimonial->content = $request->content;
        if($request->hasFile('image')) {
            $testimonial->image = ImageUpload($request->image, TESTIMONIAL, $testimonial->image);
        }
        $testimonial->save();

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial item updated successfully');
    }

    public function delete(Request $request)
    {
        $testimonial = Testimonial::where('id', $request->data_id)->firstOrFail();
        removeImage($testimonial->image);
        $testimonial->delete();
    }

    public function section()
    {
        $testimonial = TestimonialSection::first();
        return view('back.testimonial.section', compact('testimonial'));
    }

    public function section_update(Request $request)
    {
        $id = $request->id;
        $testimonial = TestimonialSection::first();

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        if(!$testimonial) {
            $testimonial = new TestimonialSection();
        }

        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $testimonial->save();

        return redirect()->route('admin.testimonial.section')->with('success', 'Testimonial section updated successfully');

    }
}
