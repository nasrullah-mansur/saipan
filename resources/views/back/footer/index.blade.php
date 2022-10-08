@extends('layouts.back')

@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Footer Setting</h4>
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
                            <form action="{{ route('admin.footer.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <fieldset class="form-group">
                                            <div class="preview_img {{ $footer ? 'd-block' : '' }}">
                                                <img width="120" src="{{ asset($footer ? $footer->image : 'demo.jpg') }}" alt="demo">
                                            </div>
                                            <label for="basicSelect">Choose footer logo</label>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" >Choose image</label>
                                          </div>
                                          @if($errors->has('image'))
                                          <small class="text-danger">{{ $errors->first('image') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-12">
                                        <fieldset class="form-group">
                                          <label for="content">Footer Content</label>
                                          <input value="{{ $footer ? $footer->content : '' }}" type="text" name="content" class="form-control" id="content">
                                          @if($errors->has('content'))
                                          <small class="text-danger">{{ $errors->first('content') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-12">
                                        <fieldset class="form-group">
                                          <label for="copyright">Copyright</label>
                                          <input value="{{ $footer ? $footer->copyright : '' }}" type="text" name="copyright" class="form-control" id="copyright">
                                          @if($errors->has('copyright'))
                                          <small class="text-danger">{{ $errors->first('copyright') }}</small>
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