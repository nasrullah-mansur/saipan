@extends('layouts.back')

@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Taxi page info</h4>
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
                    <!-- Content -->
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('admin.page.taxi.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img {{ $taxi ? 'd-block' : '' }}">
                                                <img width="120" src="{{ asset($taxi ? $taxi->page_banner_image : 'demo.jpg') }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose page banner image (1440*220)</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="page_banner_image">
                                            <label class="custom-file-label" >Choose page banner image</label>
                                          </div>
                                          @if($errors->has('page_banner_image'))
                                          <small class="text-danger">{{ $errors->first('page_banner_image') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="taxi_title">Taxi Section Title</label>
                                          <input value="{{ $taxi ? $taxi->taxi_title : '' }}" type="text" name="taxi_title" class="form-control" id="taxi_title">
                                          @if($errors->has('taxi_title'))
                                          <small class="text-danger">{{ $errors->first('taxi_title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="taxi_description">Taxi Section Description</label>
                                          <textarea name="taxi_description" class="form-control w-100" id="taxi_description" rows="3">{{ $taxi ? $taxi->taxi_description : '' }}</textarea>
                                    </div>

                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="taxi_limit">Taxi Item Limit</label>
                                          <input value="{{ $taxi ? $taxi->taxi_limit : '' }}" type="number" name="taxi_limit" class="form-control" id="taxi_limit">
                                          @if($errors->has('taxi_limit'))
                                          <small class="text-danger">{{ $errors->first('taxi_limit') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                              <i class="fa fa-check-square-o"></i> Save Change
                                            </button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Content -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection