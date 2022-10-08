@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2">Slider list</h4>
                        <a id="addItemBtn" href="#" data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Social</a>
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
                <h4 class="modal-title" id="addModalLabel1">Social Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataForm" class="form" action="{{ route('admin.social.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" placeholder="Title" name="title">
                            @if($errors->has('title'))
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                            @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="class_name">Class Name (fontawesome v-5.15.3)</label>
                            <input type="text" id="class_name" class="form-control" placeholder="Class Name" name="class_name">
                            @if($errors->has('class_name'))
                            <small class="text-danger">{{ $errors->first('class_name') }}</small>
                            @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" id="link" class="form-control" placeholder="Link" name="link">
                            @if($errors->has('link'))
                            <small class="text-danger">{{ $errors->first('link') }}</small>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="target">Target</label>
                            <select id="target" name="target" class="form-control">
                              <option value="_self">_self</option>
                              <option value="_blank">_blank</option>
                            </select>
                          </div>
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
                        url: '{{ route('admin.social.delete') }}',
                        data: {
                            'id': delteteDataId,
                        },
                        success: function(response){
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
        $('#addModal form')[0].reset();
        $('#addModal').modal('show');
        $('#dataForm').attr('action', "{{ route('admin.social.update') }}");
        $.ajax({
            method: "GET",
            url: '{{ route('admin.social.edit') }}',
            data: {
                'id': editDataId,
            },
            success: function(response){
                $('[name="title"]').val(response.title);
                $('[name="class_name"]').val(response.class_name);
                $('[name="link"]').val(response.link);
                $('[name="target"]').val(response.target);
                $('[name="data_id"]').val(editDataId);
            }
        });
        

    });

    // Create;
    $('#addItemBtn').on('click', function(e) {
        e.preventDefault();
        $('#addModal form')[0].reset();
        $('#dataForm').attr('action', "{{ route('admin.social.store') }}");
    })

</script>
@endsection