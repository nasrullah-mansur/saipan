@extends('layouts.back')

@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Theme Appearance Create</h4>
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
                            <form method="POST" action="{{ route('setting.appearance.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="title">Page title</label>
                                          <input name="title" type="text" class="form-control" id="title" value="{{ $app ? $app->title : '' }}">
                                          @if($errors->has('title'))
                                          <small class="text-danger">{{ $errors->first('title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                                                        
                                    <div class="col-lg-6 col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img {{ appearance() ? 'd-block' : '' }}">
                                                <img width="120" src="{{ asset($app ? $app->logo : 'demo.jpg') }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose logo image</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="logo">
                                            <label class="custom-file-label" >Choose logo</label>
                                          </div>
                                          @if($errors->has('logo'))
                                          <small class="text-danger">{{ $errors->first('logo') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                                                        
                                    <div class="col-lg-6 col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img {{ appearance() ? 'd-block' : '' }}">
                                                <img width="120" src="{{ asset($app ? $app->favicon : 'demo.jpg') }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose favicon image</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="favicon">
                                            <label class="custom-file-label" >Choose favicon</label>
                                          </div>
                                          @if($errors->has('favicon'))
                                          <small class="text-danger">{{ $errors->first('favicon') }}</small>
                                          @endif
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