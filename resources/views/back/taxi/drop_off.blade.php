@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2">Drop off location list</h4>
                        <a id="addItemBtn" href="#" data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Pick Up Location</a>
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


<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addModalLabel1">Drop off location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataForm" class="form" action="{{ route('admin.drop.off.store') }}" method="POST">
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
                        url: '{{ route('admin.drop.off.delete') }}',
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
        $('#addModal form')[0].reset();
        $('#addModal').modal('show');
        $('#dataForm').attr('action', "{{ route('admin.drop.off.update') }}");
        $.ajax({
            method: "GET",
            url: '{{ route('admin.drop.off.edit') }}',
            data: {
                'id': editDataId,
            },
            success: function(response){
                console.log(response);
                $('[name="title"]').val(response.title);
                $('[name="data_id"]').val(editDataId);
            }
        });
        

    });

    // Create;
    $('#addItemBtn').on('click', function(e) {
        e.preventDefault();
        $('#addModal form')[0].reset();
        $('#dataForm').attr('action', "{{ route('admin.drop.off.store') }}");
    })

</script>
@endsection