<?php

namespace App\Http\Controllers;

use App\Models\Admin\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function index()
    {
        $meta = Meta::first();
        return view('back.meta.index', compact('meta'));
    }

    public function store(Request $request)
    {

        $meta = Meta::first();

        if(!$meta) {
          $meta = new Meta();  
        }

        $meta->content = $request->content;

        $meta->save();

        return redirect()->route('admin.meta')->with('success', 'Meta content update successfully');
    }
}
