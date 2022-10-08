<?php

use App\Models\Admin\Meta;
use App\Models\Admin\Taxi;
use Illuminate\Support\Str;
use App\Models\Admin\Footer;
use App\Models\Admin\Header;
use App\Models\Admin\PickUp;
use App\Models\Admin\Saipan;
use App\Models\Admin\Contact;
use App\Models\Admin\DropOff;
use App\Models\Admin\Appearance;
use App\Models\Admin\FooterGallery;
use App\Models\CustomCode;
use App\Models\SendEmail;
use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\File;
    use Intervention\Image\Facades\Image;

    // ========== Image Path =======================
    const SLIDER_PATH = 'uploaded_file/images/slider/';
    const APP_PATH = 'uploaded_file/images/app/';
    const TAXI_PATH = 'uploaded_file/images/taxi/';
    const SAIPAN_PATH = 'uploaded_file/images/saipan/';
    const FOOTER_LOGO = 'uploaded_file/images/footer_logo/';
    const ABOUT_PAGE = 'uploaded_file/images/about_page/';
    const TAXI_PAGE = 'uploaded_file/images/taxi_page/';
    const SAIPAN_PAGE = 'uploaded_file/images/saipan_page/';
    const TESTIMONIAL = 'uploaded_file/images/testimonial/';
    const ABOUT_SECTION = 'uploaded_file/images/about_section/';
    const TAXI_GALLERY = 'uploaded_file/images/taxi_gallery/';
    const SAIPAN_GALLERY = 'uploaded_file/images/saipan_gallery/';
    const FOOTER_GALLERY = 'uploaded_file/images/footer_gallery/';

    // ================ Image Upload =========================== //
    function ImageUpload($new_file, $path, $old_image) {
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }
        $file_name = Str::slug($new_file->getClientOriginalName()) . '_' . rand(111111, 999999) . '.' . $new_file->getClientOriginalExtension();
        $destinationPath = public_path($path);

        if($old_image != null) {
            if (File::exists(public_path($old_image))) {
                unlink(public_path($old_image));
            }
        }
        
        $new_file->move($destinationPath, $file_name);

        return $path . $file_name;
    };

    function ResizeImageUpload($new_file, $path, $old_image, $w, $h) {
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }

        $destinationPath = public_path($path);
        $file_name = Str::slug($new_file->getClientOriginalName()) . '_' . rand(111111, 999999) . '.' . $new_file->getClientOriginalExtension();

        if($old_image != null) {
            if (File::exists(public_path($old_image))) {
                unlink(public_path($old_image));
            }
        }

        Image::make($new_file)
        ->fit($w, $h)
        ->save($destinationPath . $file_name);

        return $path . $file_name;
    };


    function removeImage($file) {
        if($file != null) {
            if (File::exists(public_path($file))) {
                unlink(public_path($file));
            }
        }
    }

    // Header;
    function headerData() {
        return $header = Header::first();
    }

    function meta()
    {
        return Meta::first();
    }

    // Appearance;
    function appearance()
    {
        return $app = Appearance::first();
    }

    // Contact;
    function contact() {
        return $contact = Contact::first();
    }

    // Footer;
    function footer() {
        return Footer::first();
    }

    function footerGallery()
    {
        return FooterGallery::all();
    }

    function taxi_title()
    {
        return Taxi::all('id', 'title');
    }

    function pickUps()
    {
        return PickUp::all('id', 'title');
    }

    function dropOffs()
    {
        return DropOff::all('id', 'title');
    }

    function saipans()
    {
        return Saipan::all('id', 'title');
    }

    function my_email()
    {
        $email = SendEmail::first();
        if($email) {
            return $email->email;
        } else {
            return 'nasrullah.cit.bd@gmail.com';
        }
    }

    function custom_js()
    {
        $js = CustomCode::first();
        if($js) {
            return $js->js;
        } else {
            return null;
        }
    }

    function custom_css()
    {
        $css = CustomCode::first();
        if($css) {
            return $css->css;
        } else {
            return null;
        }
    }

?>