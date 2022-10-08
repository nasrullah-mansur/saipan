@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update about section info</h4>
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
                            <form method="POST" action="{{ route('admin.section.about.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="title">Title</label>
                                          <input name="title" type="text" class="form-control" id="title" value="{{ $about ? $about->title : '' }}">
                                          @if($errors->has('title'))
                                          <small class="text-danger">{{ $errors->first('title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control w-100" id="description" rows="3">{{ $about ? $about->description : '' }}</textarea>
                                            @if($errors->has('description'))
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img {{ $about ? 'd-block' : '' }}">
                                                <img width="120" src="{{ asset($about ? $about->image_one : 'demo.jpg') }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose first image (left image / 315*400)</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_one">
                                            <label class="custom-file-label" >Choose image</label>
                                          </div>
                                          @if($errors->has('image'))
                                          <small class="text-danger">{{ $errors->first('image') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img {{ $about ? 'd-block' : '' }}">
                                                <img width="120" src="{{ asset($about ? $about->image_two : 'demo.jpg') }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose second image (top right / 250*155)</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_two">
                                            <label class="custom-file-label" >Choose image</label>
                                          </div>
                                          @if($errors->has('image'))
                                          <small class="text-danger">{{ $errors->first('image') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img {{ $about ? 'd-block' : '' }}">
                                                <img width="120" src="{{ asset($about ? $about->image_three : 'demo.jpg') }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose third image (right bottom / 275*255)</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_three">
                                            <label class="custom-file-label" >Choose image</label>
                                          </div>
                                          @if($errors->has('image'))
                                          <small class="text-danger">{{ $errors->first('image') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="card px-0">
                                        <div class="card-header px-0">
                                            <h4 class="card-title" id="repeat-form">Add item Facilities (optional)</h4>
                                        </div>
                                        <div class="card-content  collapse show">
                                            <div class="card-body px-0">
                                            <div class="repeater-default">
                                                <div data-repeater-list="facility">
                                                    @if ($about)
                                                        @foreach (json_decode($about->facility) as $facility)
                                                        <div data-repeater-item>
                                                            <div class="row">
                                                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                    <label>Title</label>
                                                                    <br>
                                                                    <input value="{{ $facility->title }}" name="title" type="text" class="form-control" placeholder="Type here">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                    <button type="button" class="btn btn-small btn-danger" data-repeater-delete>Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div data-repeater-item>
                                                            <div class="row">
                                                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                    <label>Title</label>
                                                                    <br>
                                                                    <input name="title" type="text" class="form-control" placeholder="Type here">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                                    <button type="button" class="btn btn-small btn-danger" data-repeater-delete>Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group overflow-hidden">
                                                    <div class="col-12 pl-md-0">
                                                        <button type="button" data-repeater-create class="btn btn-secondary">Add More Facility</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                              <i class="fa fa-check-square-o"></i> Update About Info
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