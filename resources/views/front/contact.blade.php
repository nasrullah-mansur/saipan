@extends('layouts.app')

@section('content')
<!-- Page banner start -->
<div class="page-banner">
    <div class="container">
        <h1>Contact Us</h1>
        <span>Home / Contact Us</span>
    </div>
</div>
<!-- Page banner end -->

<!-- Contact start -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft">
                <div class="text">
                    <div class="section-title">
                        <h2>{{ contact() ? contact()->title : '' }}</h2>
                        <p class="m-auto">{!! contact() ? contact()->description : '' !!}</p>
                    </div>
                    <ul class="address-list">
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <h5>Call the helpline:</h5>
                            <p><a href="tel:{{ contact() ? contact()->phone : '' }}">{{ contact() ? contact()->phone : '' }}</a></p>
                        </li>
                        <li>
                            <i class="far fa-envelope"></i>
                            <h5>Email us:</h5>
                            <p><a href="mailto:{{ contact() ? contact()->email : '' }}">{{ contact() ? contact()->email : '' }}</a></p>
                        </li>
                        <li>
                            <i class="fas fa-location-arrow"></i>
                            <h5>Location:</h5>
                            <p>{!! contact() ? contact()->location : '' !!}</p>
                        </li>
                        <li>
                            <i class="far fa-clock"></i>
                            <h5>Work Hours:</h5>
                            <p>{!! contact() ? contact()->working_hours : '' !!}</p>
                        </li>
                    </ul>
                    <ul class="social-list">
                        @foreach ($socials as $social)
                        <li><a href="{{ $social->link }}" target="{{ $social->target }}"><i class="{{ $social->class_name }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
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