<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DataTables\DropOffDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\DropOff;

class DropOffController extends Controller
{
    public function index(DropOffDataTable $dataTable)
    {
        return $dataTable->render('back.taxi.drop_off');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $drop_off = new DropOff();
        $drop_off->title = $request->title;

        $drop_off->save();

        return redirect()->route('admin.drop.off')->with('success', 'Drop off location added successfully');
    }

    public function edit(Request $request)
    {
        return DropOff::where('id', $request->id)->first();
    }

    public function update(Request $request)
    {
        $drop_off = DropOff::where('id', $request->data_id)->firstOrFail();
        $request->validate([
            'title' => 'required',
        ]);

        $drop_off->title = $request->title;

        $drop_off->save();

        return redirect()->route('admin.drop.off')->with('success', 'Drop off location updated successfully');
    }

    public function delete(Request $request)
    {
        $drop_off = DropOff::where('id', $request->data_id)->firstOrFail();
        $drop_off->delete();
        return redirect()->route('admin.drop.off')->with('success', 'Drop off location removed successfully');
    }
}
