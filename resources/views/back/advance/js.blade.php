@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Custom JS</h4>
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
                            <form method="POST" action="{{ route('custom.js.update') }}">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                          <label for="js">JS</label>
                                          <textarea name="js" class="form-control w-100" id="js" rows="6">{{ $code ? $code->js : '' }}</textarea>
                                          @if($errors->has('js'))
                                          <small class="text-danger">{{ $errors->first('js') }}</small>
                                          @endif
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                              <i class="fa fa-check-square-o"></i> Save CSS
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
