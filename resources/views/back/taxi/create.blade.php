@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Taxi Item Create</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a data-action="collapse"><i class="ft-minus"></i></a>
                                </li>
                                <li>
                                    <a data-action="reload"><i class="ft-rotate-cw"></i></a>
                                </li>
                                <li>
                                    <a data-action="expand"><i class="ft-maximize"></i></a>
                                </li>
                                <li>
                                    <a data-action="close"><i class="ft-x"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- Content --}}
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <form method="POST" action="{{ route('admin.taxi.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="heading">Title</label>
                                          <input name="title" type="text" class="form-control" id="heading">
                                          @if($errors->has('title'))
                                          <small class="text-danger">{{ $errors->first('title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="sub_title">Sub Title</label>
                                          <input name="sub_title" type="text" class="form-control" id="sub_title">
                                          @if($errors->has('sub_title'))
                                          <small class="text-danger">{{ $errors->first('sub_title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="from">Price from</label>
                                          <input name="from" type="text" class="form-control" id="from">
                                          @if($errors->has('from'))
                                          <small class="text-danger">{{ $errors->first('from') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="description">Description</label>
                                          <textarea name="description" class="form-control w-100" id="description" rows="6"></textarea>
                                          @if($errors->has('description'))
                                          <small class="text-danger">{{ $errors->first('description') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset class="form-group">
                                          <label for="pick_up">Pick up location</label>
                                          <select name="pick_up_id" class="form-control" id="pick_up">
                                            @foreach (App\Models\Admin\PickUp::all() as $pickup)
                                            <option value="{{ $pickup->id }}">{{ $pickup->title }}</option>
                                            @endforeach
                                          </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset class="form-group">
                                          <label for="drop_of">Drop of location</label>
                                          <select name="drop_off_id" class="form-control" id="drop_of">
                                            @foreach (App\Models\Admin\DropOff::all() as $dropoff)
                                            <option value="{{ $dropoff->id }}">{{ $dropoff->title }}</option>
                                            @endforeach
                                          </select>
                                        </fieldset>
                                    </div>

                                    <div class="col-12">
                                        <div class="card px-0">
                                        <div class="card-header px-0">
                                            <h4 class="card-title" id="repeat-form">Add item Features (optional)</h4>
                                        </div>
                                        <div class="card-content  collapse show">
                                            <div class="card-body px-0">
                                            <div class="repeater-default">
                                                <div data-repeater-list="features">
                                                    <div data-repeater-item>
                                                        <div class="row">
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label>Name</label>
                                                                <br>
                                                                <input name="name" type="text" class="form-control" placeholder="Name">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label>Value</label>
                                                                <br>
                                                                <input name="value" type="text" class="form-control" placeholder="Value">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                <button type="button" class="btn btn-small btn-danger" data-repeater-delete>Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group overflow-hidden">
                                                    <div class="col-12 pl-md-0">
                                                        <button type="button" data-repeater-create class="btn btn-secondary">Add New Fature</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img">
                                                <img width="120" src="{{ asset('demo.jpg') }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose taxi image (185*185)</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" >Choose image</label>
                                          </div>
                                          @if($errors->has('image'))
                                          <small class="text-danger">{{ $errors->first('image') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12"></div>
                                    
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                              <i class="fa fa-check-square-o"></i> Save Item
                                            </button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Content --}}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('custom_js')
<script src="{{ asset('back/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('back/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
@endsection