@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2">Drop off location list</h4>
                        <a id="addItemBtn" href="#" data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Gallery Item</a>
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
                            <div class="table-responsive table-area">
                                {{$dataTable->table(['class' => 'table table-bordered'])}}
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Add Social --}}
<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addModalLabel1">Your Gallery Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataForm" class="form" action="{{ route('admin.gallery.taxi.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <fieldset class="form-group">
                                <div class="preview_img">
                                    <img width="130" src="{{ asset('demo.jpg') }}" alt="demo">
                                </div>
                                <label for="basicSelect">Choose gallery image (335*245)</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label" >Choose image</label>
                              </div>
                              @if($errors->has('image'))
                              <small class="text-danger">{{ $errors->first('image') }}</small>
                              @endif
                            </fieldset>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <label for="alt">Alt Text</label>
                            <input type="text" id="alt" class="form-control" placeholder="Alt here" name="alt">
                            @if($errors->has('alt'))
                            <small class="text-danger">{{ $errors->first('alt') }}</small>
                            @endif
                          </div>
                        </div>

                        <div class="col-lg-12">
                            <fieldset class="form-group">
                              <label for="taxi">Select Taxi Item</label>
                              <select name="taxi_id" class="form-control" id="taxi">
                                @foreach (App\Models\Admin\Taxi::all() as $taxi)
                                <option value="{{ $taxi->id }}">{{ $taxi->title }}</option>
                                @endforeach
                              </select>
                            </fieldset>
                        </div>
                        
                        
                      </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="data_id" value="0">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                      </button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

  
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush

@section('custom_js')
<script>
    // Delete Data;
    $('.table-area').on('click', '.delete-data', function(e) {
        e.preventDefault();
            let delteteDataId = $(this).attr("data-id");
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: "warning",
                showCancelButton: true,
                buttons: {
                    cancel: {
                        text: "No, cancel please!",
                        value: null,
                        visible: true,
                        className: "btn-warning",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Yes, delete it!",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                },
            }).then((isConfirm) => {
                if (isConfirm) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('admin.gallery.taxi.delete') }}',
                        data: {
                            'data_id': delteteDataId,
                        },
                        success: function(response){
                            console.log(response);
                            swal({
                                icon: "success",
                                title: "Deleted!",
                                text: "Your imaginary data has been deleted.",
                                timer: 2000,
                                showConfirmButton: true,
                            });
                            $('.dataTable').DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal({
                        icon: "error",
                        title: "Cancelled!",
                        text: "Your imaginary file is safe :",
                        timer: 2000,
                        showConfirmButton: true,
                    });
                }
            });
    });

    // Edit;
    $('.table-area').on('click', '.edit-btn', function(e){
        e.preventDefault();
        let editDataId = $(this).attr("data-id");
        let alt = $(this).parents('tr').find('td:nth-child(3)').text();
        let img = $(this).parents('tr').find('img').attr('src');
        let taxi_id = $(this).attr("data-taxi_id");
        console.log(taxi_id);
        $('#addModal form')[0].reset();
        $('#addModal').modal('show');
        $('#dataForm').attr('action', "{{ route('admin.gallery.taxi.update') }}");
        $('[name="alt"]').val(alt);
        $('[name="data_id"]').val(editDataId);
        $('[name="taxi_id"]').val(taxi_id);
        $('.preview_img').show();
        $('.preview_img img').attr('src', img);
                

    });

    // Create;
    $('#addItemBtn').on('click', function(e) {
        e.preventDefault();
        $('#addModal form')[0].reset();
        $('.preview_img').hide();
        $('#dataForm').attr('action', "{{ route('admin.gallery.taxi.create') }}");
    })

</script>
@endsection