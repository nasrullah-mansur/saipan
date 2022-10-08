@extends('layouts.app')

@section('content')
<!-- Banner start -->
<section class="banner">
    <div class="slider">
        <div class="slider-area">
            @foreach ($sliders as $slider)
            <div class="slider-item" style="background-image: url({{ asset($slider->image) }});">
                <div class="container">
                    <div class="slider-content col-lg-6">
                        <h2>{{ $slider->header }}</h2>
                        <p>{{ $slider->content }}</p>
                        @if ($slider->btn == 'taxi')
                        <a href="{{ route('taxi') }}">Book Taxi</a>
                        @elseif ($slider->btn = 'saipan')
                        <a href="{{ route('saipan') }}">Book Saipan</a>
                        @else
                        <a href="{{ route('contact') }}">Contact Us</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="banner-form">
        <div class="form-content">
            <ul class="nav" id="bookingBannerModal" role="tablist">
                <li role="presentation">
                  <button class=" active" id="taxi-tab" data-bs-toggle="tab" data-bs-target="#taxi" type="button" role="tab" aria-controls="taxi" aria-selected="true">taxi</button>
                </li>
                <li role="presentation">
                  <button class="" id="saipan-tab-modal" data-bs-toggle="tab" data-bs-target="#saipan-modal" type="button" role="tab" aria-controls="saipan-modal" aria-selected="false">saipan</button>
                </li>
            </ul>
            <div class="tab-content" id="bookingBannerModalContent">
              <div class="tab-pane fade show active" id="taxi" role="tabpanel" aria-labelledby="taxi-tab">
                <form class="taxi-form" action="{{ route('order.taxi') }}" method="POST">
                    @csrf
                    <div class="input-item">
                        <input name="name" type="text" placeholder="Your name">
                        @if ($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input name="email" type="email" placeholder="Your email">
                         @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input name="phone" type="text" placeholder="Your phone no">
                         @if ($errors->has('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <select name="taxi_id" class="taxi-select">
                            <option></option>
                            @foreach ($taxis as $taxi)
                            <option value="{{ $taxi->id }}">{{ $taxi->title }}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('taxi_id'))
                        <small class="text-danger">{{ $errors->first('taxi_id') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <select name="pick_up" class="taxi-pickup">
                            <option></option>
                            @foreach (pickUps() as $pickUp)
                            <option value="{{ $pickUp->id }}">{{ $pickUp->title }}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('pick_up'))
                        <small class="text-danger">{{ $errors->first('pick_up') }}</small>
                        @endif
                    </div>
                    
                    <div class="input-item">
                        <select name="drop_off" class="taxi-drop">
                            <option></option>
                            @foreach (dropOffs() as $dropOff)
                            <option value="{{ $dropOff->id }}">{{ $dropOff->title }}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('drop_off'))
                        <small class="text-danger">{{ $errors->first('drop_off') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input name="date_and_time" class="date_time" type="text" placeholder="Select date & time">
                         @if ($errors->has('date_and_time'))
                        <small class="text-danger">{{ $errors->first('date_and_time') }}</small>
                        @endif
                    </div>
                    <div class="submit-area">
                        <button type="submit">Order Now</button>
                    </div>
                </form>
              </div>
              <div class="tab-pane fade" id="saipan-modal" role="tabpanel" aria-labelledby="saipan-tab-modal">
                <form class="saipan-form" action="{{ route('order.saipan') }}" method="POST">
                    @csrf
                    
                    <div class="input-item">
                        <input name="s_name" type="text" placeholder="Your name">
                        @if ($errors->has('s_name'))
                        <small class="text-danger">{{ $errors->first('s_name') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input type="text" name="s_email" placeholder="Your email">
                        @if ($errors->has('s_email'))
                        <small class="text-danger">{{ $errors->first('s_email') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input type="text" name="s_phone" placeholder="Your phone no">
                        @if ($errors->has('s_phone'))
                        <small class="text-danger">{{ $errors->first('s_phone') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <select name="saipan_id" class="saipan-select">
                            <option></option>
                            @foreach (saipans() as $saipan)
                            <option value="{{ $saipan->id }}">{{ $saipan->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('saipan_id'))
                        <small class="text-danger">{{ $errors->first('saipan_id') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input type="number" name="s_amount" placeholder="Amount of seat">
                        @if ($errors->has('s_amount'))
                        <small class="text-danger">{{ $errors->first('s_amount') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input class="date_time" name="s_date_and_time" type="text" placeholder="Select date & time">
                        @if ($errors->has('s_date_and_time'))
                        <small class="text-danger">{{ $errors->first('s_date_and_time') }}</small>
                        @endif
                    </div>
                    <div class="submit-area">
                        <button type="submit">Order Now</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner end -->

@if ($about_sec)
<!-- About start -->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 animated fadeInLeft">
                <div class="img">
                    <img class="big high" src="{{ asset($about_sec->image_one ? $about_sec->image_one : 'front/images/about-1.png') }}" alt="im{{ env('APP_NAME') }}">
                    <img class="small" src="{{ asset($about_sec->image_two ? $about_sec->image_two : 'front/images/about-2.png') }}" alt="im{{ env('APP_NAME') }}">
                    <img class="big low" src="{{ asset($about_sec->image_three ? $about_sec->image_three : 'front/images/about-3.png') }}" alt="im{{ env('APP_NAME') }}">
                </div>
            </div>
            <div class="col-lg-6 animated fadeInRight">
                <div class="text">
                    <div class="section-title">
                        <h2>{{ $about_sec->title }}</h2>
                    </div>
                    <p>{!! $about_sec->description !!}</p>
                    @if ($about_sec->facility)
                    <ul>
                        @foreach (json_decode($about_sec->facility) as $facility)
                        <li><i class="fas fa-check"></i> {{ $facility->title }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <a class="default-btn" href="{{ route('about') }}">Know More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About end -->
@endif

<!-- Taxi start -->
<section class="taxi">
    <div class="container">
        <div class="section-title text-center title-margin">
            @if ($index_page)
            <h2>{{ $index_page->taxi_title }}</h2>
            <p class="m-auto">{!! $index_page->taxi_description !!}</p>
            @endif
        </div>
        <div class="row">
            @foreach ($taxis as $taxi)
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="{{ ($loop->iteration) / 4 }}s">
                <div class="taxi-item" data-id="{{ $taxi->id }}" data-title="{{ $taxi->title }}">
                    <div class="img">
                        <a href="{{ route('taxi.single', $taxi->slug) }}">
                            <img src="{{ asset($taxi->image) }}" alt="{{ $taxi->title }}">
                        </a>
                    </div>
                    <div class="text">
                        <h4><a href="{{ route('taxi.single', $taxi->slug) }}">{{ $taxi->title }}</a></h4>
                        <p>{{ $taxi->sub_title }}</p>
                        <div>
                            <div class="from-add">
                                <p class="address-con d-flex">From <span> {{ App\Models\Admin\PickUp::where('id', $taxi->pick_up_id)->first()->title }}</span> To <span>{{ App\Models\Admin\DropOff::where('id', $taxi->pick_up_id)->first()->title }}</p>
                                <span>Far: ${{ number_format($taxi->from, 2, '.', ' ') }}</span>
                            </div>
                            <div class="ms-auto">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#taxiModal" class="book-now">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if (App\Models\Admin\Taxi::count() > $taxis->count())
        <div class="section-btn pt-5 text-center">
            <a href="{{ route('taxi') }}">
                <span>All Taxi</span>
                <span class="border"></span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        @endif
    </div>
</section>
<!-- Taxi end -->

<!-- Services start -->
<section class="service">
    <div class="container">
        <div class="section-title text-center title-margin">
            @if ($index_page)
            <h2>{{ $index_page->saipan_title }}</h2>
            <p class="m-auto">{!! $index_page->saipan_description !!}</p>
            @endif
        </div>
        <div class="row">
            @foreach ($saipans as $saipan)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ ($loop->iteration) / 4 }}s">
                <div class="service-item saipan-item" data-id="{{ $saipan->id }}" data-title="{{ $saipan->title }}">
                    <div class="img">
                        <span class="price">From: ${{ number_format($saipan->from, 2, '.', ' ') }}</span>
                        <a href="{{ route('saipan.single', $saipan->slug) }}">
                            <img class="img-fluid w-100" src="{{ asset($saipan->image) }}" alt="{{ $saipan->title }}">
                        </a>
                    </div>
                    <div class="text">
                        <h4><a href="{{ route('saipan.single', $saipan->slug) }}">{{ $saipan->title }}</a></h4>
                        <p>{{ $saipan->sub_title }}</p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#saipanModal" class="book-btn">Book Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if (App\Models\Admin\Saipan::count() > $saipans->count())
        <div class="section-btn pt-5 text-center">
            <a href="{{ route('saipan') }}">
                <span>All Saipan</span>
                <span class="border"></span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        @endif
    </div>
</section>
<!-- Services end -->

<!-- Contact start -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft">
                @if (contact())
                <div class="text">
                    <div class="section-title">
                        <h2>{{ contact()->title }}</h2>
                        <p class="m-auto">{!! contact()->description !!}</p>
                    </div>
                    <ul class="address-list">
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <h5>Call the helpline:</h5>
                            <p><a href="tel:{{ contact()->phone }}">{{ contact()->phone }}</a></p>
                        </li>
                        <li>
                            <i class="far fa-envelope"></i>
                            <h5>Email us:</h5>
                            <p><a href="mailto:{{ contact()->email }}">{{ contact()->email }}</a></p>
                        </li>
                        <li>
                            <i class="fas fa-location-arrow"></i>
                            <h5>Location:</h5>
                            <p>{!! contact()->location !!}</p>
                        </li>
                        <li>
                            <i class="far fa-clock"></i>
                            <h5>Work Hours:</h5>
                            <p>{!! contact()->working_hours !!}</p>
                        </li>
                    </ul>
                    <ul class="social-list">
                        @foreach ($socials as $social)
                        <li><a href="{{ $social->link }}" target="{{ $social->target }}"><i class="{{ $social->class_name }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-lg-6 wow fadeInRight">
                <div class="form">
                    <form action="{{ route('contact.index.store') }}" method="POST">
                        @csrf
                        <div class="input-item">
                            <label for="name">Full Name</label>
                            <input name="d_name" placeholder="Your full Name" type="text" id="name">
                            @if ($errors->has('d_name'))
                                <small class="text-danger">{{ $errors->first('d_name') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <label for="email">Email</label>
                            <input name="d_email" placeholder="Your email address" type="email" id="email">
                            @if ($errors->has('d_email'))
                                <small class="text-danger">{{ $errors->first('d_email') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <label for="phone">Phone</label>
                            <input name="d_phone" placeholder="Your phone no" type="text" id="phone">
                            @if ($errors->has('d_phone'))
                                <small class="text-danger">{{ $errors->first('d_phone') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <label for="subject">Subject</label>
                            <input name="subject" placeholder="Your subject" type="text" id="subject">
                            @if ($errors->has('subject'))
                                <small class="text-danger">{{ $errors->first('subject') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <label for="message">Message</label>
                            <textarea name="message" placeholder="Your message here..." id="message"></textarea>
                            @if ($errors->has('message'))
                                <small class="text-danger">{{ $errors->first('message') }}</small>
                            @endif
                        </div>
                        <div class="submit-area">
                            <button type="submit">Submit request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact end -->

<!-- Taxi Modal -->
<div class="modal fade" id="taxiModal" tabindex="-1" aria-labelledby="taxiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="taxiModalLabel">Order Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body mb-3">
            <form action="{{ route('order.taxi') }}" method="POST">
                @csrf
                <div class="form-content pt-0">
                    <h4 id="taxiModalTitle"></h4>
                    <input id="taxiItemId" type="hidden" name="taxi_id">
                    <div class="input-item">
                        <input type="text" name="name" placeholder="Your name">
                        @if ($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input type="text" name="email" placeholder="Your email">
                        @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input type="text" name="phone" placeholder="Your phone">
                        @if ($errors->has('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="input-item ">
                        <select name="pick_up" class="taxi-pickup">
                            <option></option>
                            @foreach (pickUps() as $pickUp)
                                <option value="{{ $pickUp->id }}">{{ $pickUp->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('pick_up'))
                        <small class="text-danger">{{ $errors->first('pick_up') }}</small>
                        @endif
                    </div>
                    <div class="input-item ">
                        <select name="drop_off" class="taxi-drop">
                            <option></option>
                            @foreach (dropOffs() as $dropOff)
                                <option value="{{ $dropOff->id }}">{{ $dropOff->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('drop_off'))
                        <small class="text-danger">{{ $errors->first('drop_off') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input name="date_and_time" class="date_time" type="text" placeholder="Select date & time">
                        @if ($errors->has('date_and_time'))
                        <small class="text-danger">{{ $errors->first('date_and_time') }}</small>
                        @endif
                    </div>
                    
                    <div class="submit-area w-100">
                        <button type="submit">Order Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- Saipan Modal -->
<div class="modal fade" id="saipanModal" tabindex="-1" aria-labelledby="saipanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="saipanModalLabel">Order Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body mb-3">
            <form action="{{ route('order.saipan') }}" method="POST">
                @csrf
                <div class="form-content pt-0">
                    <h4 id="saipanModalTitle"></h4>
                    <input id="saipanItemId" type="hidden" name="saipan_id">
                    <div class="input-item">
                        <input name="s_name" type="text" placeholder="Your name">
                        @if ($errors->has('s_name'))
                        <small class="text-danger">{{ $errors->first('s_name') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input type="text" name="s_email" placeholder="Your email">
                        @if ($errors->has('s_email'))
                        <small class="text-danger">{{ $errors->first('s_email') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input type="text" name="s_phone" placeholder="Your phone">
                        @if ($errors->has('s_phone'))
                        <small class="text-danger">{{ $errors->first('s_phone') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input type="number" name="s_amount" placeholder="Amount of seats">
                        @if ($errors->has('s_amount'))
                        <small class="text-danger">{{ $errors->first('s_amount') }}</small>
                        @endif
                    </div>
                    <div class="input-item">
                        <input class="date_time" name="s_date_and_time" type="text" placeholder="Select date & time">
                        @if ($errors->has('s_date_and_time'))
                        <small class="text-danger">{{ $errors->first('s_date_and_time') }}</small>
                        @endif
                    </div>
                    
                    <div class="submit-area w-100">
                        <button type="submit">Order Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- Book Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="bookModalLabel">Book Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body mb-3">
            <div class="form-content">
                <ul class="nav" id="bookingBanner" role="tablist">
                    <li role="presentation">
                      <button class=" active" id="taxi-tab-modal" data-bs-toggle="tab" data-bs-target="#taxi-modal" type="button" role="tab" aria-controls="taxi-modal" aria-selected="true">taxi</button>
                    </li>
                    <li role="presentation">
                      <button class="" id="saipan-tab" data-bs-toggle="tab" data-bs-target="#saipan" type="button" role="tab" aria-controls="saipan" aria-selected="false">saipan</button>
                    </li>
                </ul>
                <div class="tab-content" id="bookingBannerContent">
                  <div class="tab-pane fade show active" id="taxi-modal" role="tabpanel" aria-labelledby="taxi-tab-modal">
                    <form class="taxi-form" action="{{ route('order.taxi') }}" method="POST">
                        @csrf
                        <div class="input-item">
                            <input name="name" type="text" placeholder="Your name">
                            @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <input name="email" type="text" placeholder="Your email">
                            @if ($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <input name="phone" type="text" placeholder="Your phone no">
                            @if ($errors->has('phone'))
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <select name="taxi_id" class="taxi-select">
                                <option></option>
                                @foreach (taxi_title() as $taxi)
                                <option value="{{ $taxi->id }}">{{ $taxi->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('taxi_id'))
                            <small class="text-danger">{{ $errors->first('taxi_id') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <select name="pick_up" class="taxi-pickup">
                                <option></option>
                                @foreach (pickUps() as $pickUp)
                                <option value="{{ $pickUp->id }}">{{ $pickUp->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('pick_up'))
                            <small class="text-danger">{{ $errors->first('pick_up') }}</small>
                            @endif
                        </div>
                        
                        <div class="input-item">
                            <select name="drop_off" class="taxi-drop">
                                <option></option>
                                @foreach (dropOffs() as $dropOff)
                                <option value="{{ $dropOff->id }}">{{ $dropOff->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('drop_off'))
                            <small class="text-danger">{{ $errors->first('drop_off') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <input name="date_and_time" class="date_time" type="text" placeholder="Select date & time">
                            @if ($errors->has('date_and_time'))
                            <small class="text-danger">{{ $errors->first('date_and_time') }}</small>
                            @endif
                        </div>
                        <div class="submit-area">
                            <button type="submit">Order Now</button>
                        </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="saipan" role="tabpanel" aria-labelledby="saipan-tab">
                    <form class="saipan-form" action="{{ route('order.saipan') }}" method="POST">
                        @csrf
                        <div class="input-item">
                            <input name="s_name" type="text" placeholder="Your name">
                            @if ($errors->has('s_name'))
                            <small class="text-danger">{{ $errors->first('s_name') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <input name="s_email" type="text" placeholder="Your email">
                            @if ($errors->has('s_email'))
                            <small class="text-danger">{{ $errors->first('s_email') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <input name="s_phone" type="text" placeholder="Your phone no">
                            @if ($errors->has('s_phone'))
                            <small class="text-danger">{{ $errors->first('s_phone') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <select name="saipan_id" class="saipan-select">
                                <option></option>
                                @foreach (saipans() as $saipan)
                                <option value="{{ $saipan->id }}">{{ $saipan->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('saipan_id'))
                            <small class="text-danger">{{ $errors->first('saipan_id') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <input name="s_amount" type="text" placeholder="Amount of seat">
                            @if ($errors->has('s_amount'))
                            <small class="text-danger">{{ $errors->first('s_amount') }}</small>
                            @endif
                        </div>
                        <div class="input-item">
                            <input name="s_date_and_time" class="date_time" type="text" placeholder="Select date & time">
                            @if ($errors->has('s_date_and_time'))
                            <small class="text-danger">{{ $errors->first('s_date_and_time') }}</small>
                            @endif
                        </div>
                        <div class="submit-area">
                            <button type="submit">Order Now</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection