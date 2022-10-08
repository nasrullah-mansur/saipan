@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update testimonial section info</h4>
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
                            <form method="POST" action="{{ route('admin.testimonial.section.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="title">Title</label>
                                          <input name="title" type="text" class="form-control" id="title" value="{{ $testimonial ? $testimonial->title : '' }}">
                                          @if($errors->has('title'))
                                          <small class="text-danger">{{ $errors->first('title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control w-100" id="description" rows="3">{{ $testimonial ? $testimonial->description : '' }}</textarea>
                                            @if($errors->has('description'))
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                            @endif
                                        </fieldset>
                                    </div>

                                    <input type="hidden" name="id" value="{{ $testimonial ? $testimonial->id : '' }}">
                                                                        
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                              <i class="fa fa-check-square-o"></i> Update Info
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
