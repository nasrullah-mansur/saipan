<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterGalleryDataTable;
use App\DataTables\SaipanGalleryDataTable;
use App\DataTables\TaxiGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\FooterGallery;
use App\Models\Admin\SaipanGallery;
use App\Models\Admin\TaxiGallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function taxi(TaxiGalleryDataTable $dataTable)
    {
        return $dataTable->render('back.gallery.taxi');
    }

    public function taxi_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg',
            'alt' => 'required',
            'taxi_id' => 'required'
        ]);

        $gall = new TaxiGallery();
        $gall->alt = $request->alt;
        $gall->taxi_id = $request->taxi_id;
        $gall->image = ImageUpload($request->image, TAXI_GALLERY, null);

        $gall->save();

        return redirect()->route('admin.gallery.taxi.index')->with('success', 'Gallery image added successfully');
    }

    public function taxi_update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg',
            'alt' => 'required',
            'taxi_id' => 'required'
        ]);

        $gall = TaxiGallery::where('id', $request->data_id)->firstOrFail();
        $gall->alt = $request->alt;
        $gall->taxi_id = $request->taxi_id;
        if($request->hasFile('image')) {
            $gall->image = ImageUpload($request->image, TAXI_GALLERY, $gall->image);
        }

        $gall->save();

        return redirect()->route('admin.gallery.taxi.index')->with('success', 'Gallery image updated successfully');
    }

    public function taxi_delete(Request $request)
    {
        $gall = TaxiGallery::where('id', $request->data_id)->firstOrFail();
        removeImage($gall->image);
        $gall->delete();
        return redirect()->route('admin.gallery.taxi.index')->with('success', 'Gallery image removed successfully');
    }

    public function saipan(SaipanGalleryDataTable $dataTable)
    {
        return $dataTable->render('back.gallery.saipan');
    }

    public function saipan_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg',
            'alt' => 'required',
            'saipan_id' => 'required'
        ]);

        $gall = new SaipanGallery();
        $gall->alt = $request->alt;
        $gall->saipan_id = $request->saipan_id;
        $gall->image = ImageUpload($request->image, SAIPAN_GALLERY, null);

        $gall->save();

        return redirect()->route('admin.gallery.saipan.index')->with('success', 'Gallery image added successfully');
    }

    public function saipan_update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg',
            'alt' => 'required',
            'saipan_id' => 'required'
        ]);

        $gall = SaipanGallery::where('id', $request->data_id)->firstOrFail();
        $gall->alt = $request->alt;
        $gall->saipan_id = $request->saipan_id;
        if($request->hasFile('image')) {
            $gall->image = ImageUpload($request->image, TAXI_GALLERY, $gall->image);
        }

        $gall->save();

        return redirect()->route('admin.gallery.saipan.index')->with('success', 'Gallery image updated successfully');
    }

    public function saipan_delete(Request $request)
    {
        $gall = SaipanGallery::where('id', $request->data_id)->firstOrFail();
        removeImage($gall->image);
        $gall->delete();
        return redirect()->route('admin.gallery.saipan.index')->with('success', 'Gallery image removed successfully');
    }

    public function footer(FooterGalleryDataTable $dataTable)
    {
        return $dataTable->render('back.gallery.footer');
    }

    public function footer_store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg',
            'alt' => 'required',
        ]);

        $gall = new FooterGallery();
        $gall->alt = $request->alt;
        $gall->image = ImageUpload($request->image, FOOTER_GALLERY, null);

        $gall->save();

        return redirect()->route('admin.gallery.footer.index')->with('success', 'Gallery image added successfully');
    }

    public function footer_update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg',
            'alt' => 'required',
        ]);

        $gall = FooterGallery::where('id', $request->data_id)->firstOrFail();
        $gall->alt = $request->alt;

        if($request->hasFile('image')) {
            $gall->image = ImageUpload($request->image, TAXI_GALLERY, $gall->image);
        }

        $gall->save();

        return redirect()->route('admin.gallery.footer.index')->with('success', 'Gallery image updated successfully');
    }

    public function footer_delete(Request $request)
    {
        $gall = FooterGallery::where('id', $request->data_id)->firstOrFail();
        removeImage($gall->image);
        $gall->delete();
        return redirect()->route('admin.gallery.footer.index')->with('success', 'Gallery image removed successfully');
    }
}
