@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Slider Item Edit</h4>
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
                            <form method="POST" action="{{ route('admin.slider.update', $slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="heading">Slider Heading</label>
                                          <input name="header" type="text" class="form-control" id="heading" value="{{ $slider->header }}">
                                          @if($errors->has('header'))
                                          <small class="text-danger">{{ $errors->first('header') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="content">Slider Content</label>
                                          <textarea name="content" class="form-control w-100" id="content" rows="3">{{ $slider->content }}</textarea>
                                          @if($errors->has('content'))
                                          <small class="text-danger">{{ $errors->first('content') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img d-block">
                                                <img width="120" src="{{ asset($slider->image) }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose slider image (1440*565)</label>
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
                                    <div class="col-lg-6">
                                        <fieldset class="form-group">
                                          <label for="basicSelect">Button click to go</label>
                                          <select name="btn" class="form-control" id="basicSelect">
                                            <option {{ $slider->btn == 'taxi' ? 'selected' : '' }} value="taxi">Taxi page</option>
                                            <option {{ $slider->btn == 'saipan' ? 'selected' : '' }} value="saipan">Saipan page</option>
                                            <option {{ $slider->btn == 'contact' ? 'selected' : '' }} value="contact">Contact page</option>
                                          </select>
                                        </fieldset>
                                    </div>
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