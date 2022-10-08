@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update contact info</h4>
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
                            <form method="POST" action="{{ route('section.contact.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="title">Title</label>
                                          <input name="title" type="text" class="form-control" id="title" value="{{ $contact ? $contact->title : '' }}">
                                          @if($errors->has('title'))
                                          <small class="text-danger">{{ $errors->first('title') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control w-100" id="description" rows="3">{{ $contact ? $contact->description : '' }}</textarea>
                                            @if($errors->has('description'))
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="phone">Phone</label>
                                          <input name="phone" type="text" class="form-control" id="phone" value="{{ $contact ? $contact->phone : '' }}">
                                          @if($errors->has('phone'))
                                          <small class="text-danger">{{ $errors->first('phone') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="email">Email</label>
                                          <input name="email" type="text" class="form-control" id="email" value="{{ $contact ? $contact->email : '' }}">
                                          @if($errors->has('email'))
                                          <small class="text-danger">{{ $errors->first('email') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="location">Location</label>
                                          <input name="location" type="text" class="form-control" id="location" value="{{ $contact ? $contact->location : '' }}">
                                          @if($errors->has('location'))
                                          <small class="text-danger">{{ $errors->first('location') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="working_hours">Working hours</label>
                                            <textarea name="working_hours" class="form-control w-100" id="working_hours" rows="3">{{ $contact ? $contact->working_hours : '' }}</textarea>
                                            @if($errors->has('working_hours'))
                                            <small class="text-danger">{{ $errors->first('working_hours') }}</small>
                                            @endif
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                              <i class="fa fa-check-square-o"></i> Update Contact Info
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