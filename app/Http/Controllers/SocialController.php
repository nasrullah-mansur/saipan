<?php

namespace App\Http\Controllers;

use App\DataTables\SocialDataTable;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(SocialDataTable $dataTable)
    {
        return $dataTable->render('back.social.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'class_name' => 'required',
            'link' => 'required',
            'target' => 'required'
        ]);

        $social = new Social();
        $social->title = $request->title;
        $social->class_name = $request->class_name;
        $social->link = $request->link;
        $social->target = $request->target;
        $social->save();

        return redirect()->route('admin.social')->with('success', 'Social added successfully');
    }

    public function edit(Request $request)
    {
        return $social = Social::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $social = Social::where('id', $request->data_id)->firstOrFail();

        $request->validate([
            'title' => 'required',
            'class_name' => 'required',
            'link' => 'required',
            'target' => 'required'
        ]);

        $social->title = $request->title;
        $social->class_name = $request->class_name;
        $social->link = $request->link;
        $social->target = $request->target;
        $social->save();

        return redirect()->route('admin.social')->with('success', 'Social update successfully');
    }

    public function delete(Request $request)
    {
        $social = Social::where('id', $request->id)->firstOrFail();
        $social->delete();

        return redirect()->route('admin.social')->with('success', 'Social removed successfully');
    }
}
