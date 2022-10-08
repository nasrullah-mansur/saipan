<?php

namespace App\Http\Controllers;

use App\Models\Admin\AboutSection;
use App\Models\Admin\DropOff;
use App\Models\Admin\Header;
use App\Models\Admin\PickUp;
use App\Models\Admin\Saipan;
use App\Models\Admin\SaipanGallery;
use App\Models\Admin\Slider;
use App\Models\Admin\Taxi;
use App\Models\Admin\TaxiGallery;
use App\Models\Admin\TestimonialSection;
use App\Models\Pages\AboutPage;
use App\Models\Pages\IndexPage;
use App\Models\Pages\SaipanPage;
use App\Models\Pages\TaxiPage;
use App\Models\Social;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $about_sec = AboutSection::first();
        $index_page = IndexPage::first();
        $taxi_limit = $index_page ? $index_page->taxi_limit : 4;
        $saipan_limit = $index_page ? $index_page->saipan_limit : 3;
        $taxis = Taxi::limit($taxi_limit)->get();
        $saipans = Saipan::limit($saipan_limit)->get();
        $socials = Social::all();
        return view('welcome', compact(
            'sliders', 
            'taxis', 
            'saipans', 
            'about_sec', 
            'index_page',
            'socials',
        ));
    }

    public function about()
    {
        $about_sec = AboutSection::first();
        $about_page = AboutPage::first();
        $testimonials = Testimonial::all();
        $testimonial_sec = TestimonialSection::first();
        return view('front.about', compact(
            'about_sec', 
            'about_page',
            'testimonials',
            'testimonial_sec'
        ));
    }

    public function taxi()
    {
        $taxi_page = TaxiPage::first();
        $item_limit = $taxi_page ? $taxi_page->taxi_limit : 2;
        $taxis = Taxi::paginate($item_limit);
        return view('front.taxi', compact(
            'taxis',
            'taxi_page'
        ));
    }

    public function saipan()
    {
        $saipan_page = SaipanPage::first();
        $saipan_limit = $saipan_page ? $saipan_page->saipan_limit : 6;
        $saipans = Saipan::paginate($saipan_limit);
        return view('front.saipan', compact(
            'saipan_page',
            'saipan_limit',
            'saipans'
        ));
    }

    public function contact()
    {
        $socials = Social::all();
        return view('front.contact', compact('socials'));
    }

    public function taxi_show($slug)
    {
        $randTaxi = Taxi::where('slug', '!=', $slug)->inRandomOrder()->limit(5)->get();
        $taxi = Taxi::where('slug', $slug)->firstOrFail();
        $galleries = TaxiGallery::where('taxi_id', $taxi->id)->get();
        return view('front.details.taxi', compact('taxi', 'randTaxi', 'galleries'));
    }

    public function saipan_show($slug)
    {
        $randSaipan = Saipan::where('slug', '!=', $slug)->inRandomOrder()->limit(5)->get();
        $saipan = Saipan::where('slug', $slug)->firstOrFail();
        $galleries = SaipanGallery::where('saipan_id', $saipan->id)->get();
        return view('front.details.saipan', compact('saipan', 'randSaipan', 'galleries'));
    }
}
