<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\Admin\AppearanceController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DropOffController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\PickUpController;
use App\Http\Controllers\Admin\SaipanController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TaxiController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\CustomCodeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\IndexPageController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\Order\SaipanOrderController;
use App\Http\Controllers\Order\TaxiOrderController;
use App\Http\Controllers\SaipanPageController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TaxiPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/auth.php';

// *************** Front Routes **************** 
Route::get('/', [FrontController::class, 'index'])->name('welcome');
Route::get('/about-us', [FrontController::class, 'about'])->name('about');
Route::get('/taxis', [FrontController::class, 'taxi'])->name('taxi');
Route::get('/saipan', [FrontController::class, 'saipan'])->name('saipan');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

Route::get('/taxi/{slug}', [FrontController::class, 'taxi_show'])->name('taxi.single');
Route::get('/saipan/{slug}', [FrontController::class, 'saipan_show'])->name('saipan.single');

// Order taxi;
Route::post('/taxi/order', [TaxiOrderController::class, 'orderTaxi' ])->name('order.taxi');

// Order saipan;
Route::post('/saipan/order', [SaipanOrderController::class, 'orderSaipan' ])->name('order.saipan');

// Direct contact;
Route::post('direct-contact', [DirectContactController::class, 'store'])->name('contact.index.store');


// *************** Back Routes **************** 
Route::middleware('auth')->group(function() {
    // Dashboard;
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('admin')->group(function() {

        // Header;
        Route::get('header', [HeaderController::class, 'index'])->name('admin.header');
        Route::post('header/create', [HeaderController::class, 'create'])->name('admin.header.create');

        // Footer;
        Route::get('footer', [FooterController::class, 'index'])->name('admin.footer');
        Route::post('footer/create', [FooterController::class, 'create'])->name('admin.footer.create');


        // Slider;
        Route::get('slider', [SliderController::class, 'index'])->name('admin.slider');
        Route::get('slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
        Route::post('slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
        Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::post('slider/update/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
        Route::get('slider/delete', [SliderController::class, 'delete'])->name('admin.slider.delete');

        // Appearance;
        Route::get('setting/appearance', [AppearanceController::class, 'index'])->name('setting.appearance');
        Route::post('setting/appearance', [AppearanceController::class, 'update'])->name('setting.appearance.update');

        // Social;
        Route::get('socials', [SocialController::class, 'index'])->name('admin.social');
        Route::post('social/store', [SocialController::class, 'store'])->name('admin.social.store');
        Route::get('social/edit', [SocialController::class, 'edit'])->name('admin.social.edit');
        Route::post('social/update', [SocialController::class, 'update'])->name('admin.social.update');
        Route::get('social/delete', [SocialController::class, 'delete'])->name('admin.social.delete');

        // Meta;
        Route::get('meta', [MetaController::class, 'index'])->name('admin.meta');
        Route::post('meta', [MetaController::class, 'store'])->name('admin.meta.store');


        // Pick up location;
        Route::get('pick-up', [PickUpController::class, 'index'])->name('admin.pick.up');
        Route::post('pick-up/store', [PickUpController::class, 'store'])->name('admin.pick.up.store');
        Route::get('pick-up/edit', [PickUpController::class, 'edit'])->name('admin.pick.up.edit');
        Route::post('pick-up/update', [PickUpController::class, 'update'])->name('admin.pick.up.update');
        Route::get('pick-up/delete', [PickUpController::class, 'delete'])->name('admin.pick.up.delete');

        // Drop off location;
        Route::get('drop-off', [DropOffController::class, 'index'])->name('admin.drop.off');
        Route::post('drop-off/store', [DropOffController::class, 'store'])->name('admin.drop.off.store');
        Route::get('drop-off/edit', [DropOffController::class, 'edit'])->name('admin.drop.off.edit');
        Route::post('drop-off/update', [DropOffController::class, 'update'])->name('admin.drop.off.update');
        Route::get('drop-off/delete', [DropOffController::class, 'delete'])->name('admin.drop.off.delete');

        // Taxi;
        Route::get('taxi', [TaxiController::class, 'index'])->name('admin.taxi');
        Route::get('taxi/view/{id}', [TaxiController::class, 'show'])->name('admin.taxi.show');
        Route::get('taxi/create', [TaxiController::class, 'create'])->name('admin.taxi.create');
        Route::post('taxi/store', [TaxiController::class, 'store'])->name('admin.taxi.store');
        Route::get('taxi/edit/{id}', [TaxiController::class, 'edit'])->name('admin.taxi.edit');
        Route::post('taxi/update/{id}', [TaxiController::class, 'update'])->name('admin.taxi.update');
        Route::get('taxi/delete', [TaxiController::class, 'delete'])->name('admin.taxi.delete');

        // Saipan;
        Route::get('saipan', [SaipanController::class, 'index'])->name('admin.saipan');
        Route::get('saipan/view/{id}', [SaipanController::class, 'show'])->name('admin.saipan.show');
        Route::get('saipan/create', [SaipanController::class, 'create'])->name('admin.saipan.create');
        Route::post('saipan/store', [SaipanController::class, 'store'])->name('admin.saipan.store');
        Route::get('saipan/edit/{id}', [SaipanController::class, 'edit'])->name('admin.saipan.edit');
        Route::post('saipan/update/{id}', [SaipanController::class, 'update'])->name('admin.saipan.update');
        Route::get('saipan/delete', [SaipanController::class, 'delete'])->name('admin.saipan.delete');

        // User;
        Route::get('user', [UserController::class, 'index'])->name('admin.user');
        Route::get('user/view/{id}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('user/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('user/delete', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::get('user/me', [UserController::class, 'user'])->name('admin.user.me');

        // Page info;
        Route::get('/page/home', [IndexPageController::class, 'index'])->name('admin.page.index');
        Route::post('/page/home/update', [IndexPageController::class, 'update'])->name('admin.page.index.update');

        Route::get('/page/about', [AboutPageController::class, 'index'])->name('admin.page.about');
        Route::post('/page/about/update', [AboutPageController::class, 'update'])->name('admin.page.about.update');

        Route::get('/page/taxi', [TaxiPageController::class, 'index'])->name('admin.page.taxi');
        Route::post('/page/Page/update', [TaxiPageController::class, 'update'])->name('admin.page.taxi.update');

        Route::get('/page/saipan', [SaipanPageController::class, 'index'])->name('admin.page.saipan');
        Route::post('/page/saipan/update', [SaipanPageController::class, 'update'])->name('admin.page.saipan.update');

        // About section;
        Route::get('/section/about', [AboutSectionController::class, 'index'])->name('admin.section.about');
        Route::post('/section/about', [AboutSectionController::class, 'update'])->name('admin.section.about.update');

        // Contact section;
        Route::get('section/contact', [ContactController::class, 'index'])->name('section.contact');
        Route::post('section/contact', [ContactController::class, 'update'])->name('section.contact.update');

        // Testimonial;
        Route::get('testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
        Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
        Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::post('testimonial/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::get('testimonial/delete', [TestimonialController::class, 'delete'])->name('admin.testimonial.delete');

        Route::get('testimonial/section', [TestimonialController::class, 'section'])->name('admin.testimonial.section');
        Route::post('testimonial/section', [TestimonialController::class, 'section_update'])->name('admin.testimonial.section.update');

        // Gallery;
        Route::get('/gallery/taxi', [GalleryController::class, 'taxi'])->name('admin.gallery.taxi.index');
        Route::post('/gallery/taxi/create', [GalleryController::class, 'taxi_store'])->name('admin.gallery.taxi.create');
        Route::post('/gallery/taxi/update', [GalleryController::class, 'taxi_update'])->name('admin.gallery.taxi.update');
        Route::get('/gallery/taxi/delete', [GalleryController::class, 'taxi_delete'])->name('admin.gallery.taxi.delete');

        Route::get('/gallery/saipan', [GalleryController::class, 'saipan'])->name('admin.gallery.saipan.index');
        Route::post('/gallery/saipan/create', [GalleryController::class, 'saipan_store'])->name('admin.gallery.saipan.create');
        Route::post('/gallery/saipan/update', [GalleryController::class, 'saipan_update'])->name('admin.gallery.saipan.update');
        Route::get('/gallery/saipan/delete', [GalleryController::class, 'saipan_delete'])->name('admin.gallery.saipan.delete');

        Route::get('/gallery/footer', [GalleryController::class, 'footer'])->name('admin.gallery.footer.index');
        Route::post('/gallery/footer/create', [GalleryController::class, 'footer_store'])->name('admin.gallery.footer.create');
        Route::post('/gallery/footer/update', [GalleryController::class, 'footer_update'])->name('admin.gallery.footer.update');
        Route::get('/gallery/footer/delete', [GalleryController::class, 'footer_delete'])->name('admin.gallery.footer.delete');

        // Order taxi;
        Route::get('/order/taxi', [TaxiOrderController::class, 'index'])->name('admin.order.taxi');
        Route::get('/order/taxi/edit/{id}', [TaxiOrderController::class, 'edit'])->name('admin.order.taxi.edit');
        Route::post('/order/taxi/update', [TaxiOrderController::class, 'update'])->name('admin.order.taxi.update');
        Route::get('/order/taxi/delete', [TaxiOrderController::class, 'delete'])->name('admin.order.taxi.delete');

        // Order taxi;
        Route::get('/order/saipan', [SaipanOrderController::class, 'index'])->name('admin.order.saipan');
        Route::get('/order/saipan/edit/{id}', [SaipanOrderController::class, 'edit'])->name('admin.order.saipan.edit');
        Route::post('/order/saipan/update', [SaipanOrderController::class, 'update'])->name('admin.order.saipan.update');
        Route::get('/order/saipan/delete', [SaipanOrderController::class, 'delete'])->name('admin.order.saipan.delete');

        // Email info;
        Route::get('/email/set', [SendEmailController::class, 'index'])->name('sender.email');
        Route::post('/email/set', [SendEmailController::class, 'update'])->name('sender.email.update');

        // Custom code;
        Route::get('/css', [CustomCodeController::class, 'css'])->name('custom.css');
        Route::post('/css', [CustomCodeController::class, 'css_update'])->name('custom.css.update');
        Route::get('/js', [CustomCodeController::class, 'js'])->name('custom.js');
        Route::post('/js', [CustomCodeController::class, 'js_update'])->name('custom.js.update');

        // Direct Contact;
        Route::get('direct-contact', [DirectContactController::class, 'index'])->name('contact.index');
        Route::get('direct-contact/show/{id}', [DirectContactController::class, 'show'])->name('contact.index.show');
        Route::post('direct-contact/update', [DirectContactController::class, 'update'])->name('contact.index.update');
        Route::get('direct-contact/delete', [DirectContactController::class, 'delete'])->name('contact.index.delete');
    });
});