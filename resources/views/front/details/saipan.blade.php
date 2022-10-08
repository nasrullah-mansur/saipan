@extends('layouts.app')

@section('content')
<!-- Page banner start -->
<div class="page-banner-2 ">
    <div class="container">
        <span>${{ number_format($saipan->from, 2, '.', ' ') }}</span>
        <h1>{{ $saipan->title }}</h1>
        <p>{{ $saipan->sub_title }}</p>
        <a href="#" data-bs-toggle="modal" data-bs-target="#saipanModal">Order Now</a>
    </div>
</div>
<!-- Page banner end -->

<!-- Main content start -->
<main class="details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="details">
                    @if (json_decode($saipan->features)[0]->name)
                    <div class="data-item features">
                        <h4>Detail & Features</h4>
                        
                        <ul>
                            @foreach (json_decode($saipan->features) as $f)
                            <li>
                                <span>{{ $f->name }}:</span>
                                <span>{{ $f->value }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="data-item description">
                        <h4>Description</h4>
                        <p>{{ $saipan->description }}</p>
                    </div>

                    @if ($galleries->count() > 0)
                    <div class="data-item gallery">
                        <h4>Gallery</h4>
                        <ul>
                             @foreach ($galleries as $gallery)
                             <li><a href="javascript:void(0);"><img src="{{ asset($gallery->image) }}" alt="{{ $gallery->alt }}"></a></li>
                             @endforeach   
                        </ul>
                    </div>
                    @endif

                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    
                    <div class="related-items">
                        <h4>Related Saipan</h4>
                        <ul>
                            @foreach ($randSaipan as $rand_i)
                            <li>
                                <a href="{{ route('saipan.single', $rand_i->slug) }}">
                                    <img src="{{ asset($rand_i->image) }}" alt="{{ $rand_i->title }}">
                                </a>
                                <div class="content">
                                    <h5><a href="{{ route('saipan.single', $rand_i->slug) }}">{{ $rand_i->title }}</a></h5>
                                    <span>{{ $rand_i->title }}</span>
                                    <p>${{ number_format($rand_i->from, 2, '.', ' ') }}</p>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main content end -->

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
                    <h4 id="saipanModalTitle">{{ $saipan->title }}</h4>
                    <input id="saipanItemId" type="hidden" name="saipan_id" value="{{ $saipan->id }}">
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

