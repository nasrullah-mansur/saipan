@extends('layouts.back')

@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Header Setting</h4>
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
                            <form action="{{ route('admin.header.create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="opening_hours">Opening hourse</label>
                                          <input value="{{ $header ? $header->opening_hours : '' }}" type="text" name="opening_hours" class="form-control" id="opening_hours">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12">
                                        <fieldset class="form-group">
                                          <label for="status">Visibility</label>
                                          <select name="status" class="form-control" id="status">
                                            <option value="enable">Enable</option>
                                            <option value="disable">Disable</option>
                                          </select>
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