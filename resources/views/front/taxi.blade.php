@extends('layouts.app')

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ $taxi_page ? $taxi_page->page_banner_image : asset('front/images/page-banner-bg.png') }})">
    <div class="container">
        <h1>Our Taxis</h1>
        <span>Home / Taxi</span>
    </div>
</div>
<!-- Page banner end -->

<!-- Taxi start -->
<section class="taxi mt-0">
    <div class="container">
        <div class="section-title text-center title-margin">
            @if ($taxi_page)
            <h2>{{ $taxi_page->taxi_title }}</h2>
            <p class="m-auto">{!! $taxi_page->taxi_description !!}</p>
            @endif
        </div>
        <div class="row">
            @foreach ($taxis as $taxi)
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="{{ ($loop->iteration) / 4 }}s">
                <div class="taxi-item" data-id="{{ $taxi->id }}" data-title="{{ $taxi->title }}">
                    <div class="img">
                        <a href="{{ route('taxi.single', $taxi->slug) }}" >
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
        {!! $taxis->links() !!}
    </div>
</section>
<!-- Taxi end -->

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
@endsection