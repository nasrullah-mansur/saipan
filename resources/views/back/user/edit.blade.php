@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update user info</h4>
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
                            <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="name">User Name</label>
                                          <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                                          @if($errors->has('name'))
                                          <small class="text-danger">{{ $errors->first('name') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="email">User Email</label>
                                          <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}">
                                          @if($errors->has('email'))
                                          <small class="text-danger">{{ $errors->first('email') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="password">User Password</label>
                                          <input name="password" type="password" class="form-control" id="password">
                                          @if($errors->has('password'))
                                          <small class="text-danger">{{ $errors->first('password') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="confirm_password">Confirm Password</label>
                                          <input name="confirm_password" type="password" class="form-control" id="confirm_password">
                                          @if($errors->has('confirm_password'))
                                          <small class="text-danger">{{ $errors->first('confirm_password') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <span class="d-block mb-1">If you update a new user's info successfully, The user will get an email with his updated login info</span>
                                            <br>
                                            <button type="submit" class="btn btn-primary">
                                              <i class="fa fa-check-square-o"></i> Update User
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