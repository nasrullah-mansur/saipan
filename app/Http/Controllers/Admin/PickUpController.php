<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DataTables\PickUpDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\PickUp;

class PickUpController extends Controller
{
    public function index(PickUpDataTable $dataTable)
    {
        return $dataTable->render('back.taxi.pick_up');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $pick_up = new PickUp();
        $pick_up->title = $request->title;

        $pick_up->save();

        return redirect()->route('admin.pick.up')->with('success', 'Pick up location added successfully');
    }

    public function edit(Request $request)
    {
        return PickUp::where('id', $request->id)->first();
    }

    public function update(Request $request)
    {
        $pick_up = PickUp::where('id', $request->data_id)->firstOrFail();
        $request->validate([
            'title' => 'required',
        ]);

        $pick_up->title = $request->title;

        $pick_up->save();

        return redirect()->route('admin.pick.up')->with('success', 'Pick up location updated successfully');
    }

    public function delete(Request $request)
    {
        $pick_up = PickUp::where('id', $request->data_id)->firstOrFail();
        $pick_up->delete();
        return redirect()->route('admin.pick.up')->with('success', 'Pick up location removed successfully');
    }

}
