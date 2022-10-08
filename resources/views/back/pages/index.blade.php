@extends('layouts.back')

@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Index page info</h4>
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
                            <form action="{{ route('admin.page.index.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <h4 class="col-12 mb-2 primary">Taxi Section</h4>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="taxi_title">Taxi Section Title</label>
                                          <input value="{{ $index ? $index->taxi_title : '' }}" type="text" name="taxi_title" class="form-control" id="taxi_title">
                                          @if($errors->has('taxi_title'))
                                          <small class="text-danger">{{ $errors->first('taxi_title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="taxi_description">Taxi Section Description</label>
                                          <textarea name="taxi_description" class="form-control w-100" id="taxi_description" rows="3">{{ $index ? $index->taxi_description : '' }}</textarea>
                                    </div>

                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="taxi_limit">Taxi Item Limit</label>
                                          <input value="{{ $index ? $index->taxi_limit : '' }}" type="number" name="taxi_limit" class="form-control" id="taxi_limit">
                                          @if($errors->has('taxi_limit'))
                                          <small class="text-danger">{{ $errors->first('taxi_limit') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>

                                    <h4 class="col-12 mb-2 primary">Saipan Section</h4>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="saipan_title">Saipan Section Title</label>
                                          <input value="{{ $index ? $index->saipan_title : '' }}" type="text" name="saipan_title" class="form-control" id="saipan_title">
                                          @if($errors->has('saipan_title'))
                                          <small class="text-danger">{{ $errors->first('saipan_title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="saipan_description">Saipan Section Description</label>
                                          <textarea name="saipan_description" class="form-control w-100" id="saipan_description" rows="3">{{ $index ? $index->saipan_description : '' }}</textarea>
                                    </div>

                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="saipan_limit">Saipan Item Limit</label>
                                          <input value="{{ $index ? $index->saipan_limit : '' }}" type="number" name="saipan_limit" class="form-control" id="saipan_limit">
                                          @if($errors->has('saipan_limit'))
                                          <small class="text-danger">{{ $errors->first('saipan_limit') }}</small>
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