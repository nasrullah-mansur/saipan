@extends('layouts.app')

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ $about_page ? $about_page->page_banner_image : asset('front/images/page-banner-bg.png') }})">
    <div class="container">
        <h1>About Us</h1>
        <span>Home / About Us</span>
    </div>
</div>
<!-- Page banner end -->

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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About end -->
@endif

@if ($about_page)
<!-- About taxi start -->
<section class="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft">
                <div class="about-sec-text">
                    <div class="section-title">
                        <h2>{{ $about_page->taxi_title }}</h2>
                    </div>
                    <p>{!! $about_page->taxi_description !!}</p>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight">
                <div class="about-sec-img">
                    <img src="{{ $about_page->taxi_image }}" alt="{{ env('APP_NAME') }}">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 wow fadeInLeft">
                <div class="about-sec-img">
                    <img src="{{ $about_page->saipan_image }}" alt="img">
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 wow fadeInRight">
                <div class="about-sec-text">
                    <div class="section-title">
                        <h2>{{ $about_page->saipan_title }}</h2>
                    </div>
                    <p>{!! $about_page->saipan_description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About taxi end -->
@endif

<!-- Reviews start -->
<section class="review">
    <div class="container">
        <div class="section-title text-center title-margin">
            @if ($testimonial_sec)
            <h2>{{ $testimonial_sec->title }}</h2>
            <p class="m-auto">{!! $testimonial_sec->description !!}</p>  
            @endif
        </div>
        <div class="review-slide wow fadeInUp">
            @foreach ($testimonials as $testimonial)
            <div class="review-item">
                <div class="img">
                    <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}">
                </div>
                <div class="text">
                    <h5>{{ $testimonial->name }}</h5>
                    <span>{{ $testimonial->occupation }}</span>
                    <p>{{ $testimonial->content }}</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Reviews end -->

@if (contact())
<!-- Contact info start -->
<section class="contact-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <i class="fas fa-phone-alt"></i>
                    <h4>Call the helpline:</h4>
                    <p><a href="tel:{{ contact()->phone }}">{{ contact()->phone }}</a></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <i class="far fa-envelope"></i>
                    <h4>Email us:</h4>
                    <p><a href="mailto:{{ contact()->email }}">{{ contact()->email }}</a></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Location:</h4>
                    <p>{!! contact()->location !!}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <i class="far fa-clock"></i>
                    <h4>Work Hours:</h4>
                    <p>{!! contact()->working_hours !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact info end -->
@endif

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