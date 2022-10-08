@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2">Taxi Order list</h4>
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
                <h4 class="modal-title" id="addModalLabel1">Update Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataForm" class="form" action="{{ route('admin.order.saipan.update') }}" method="POST">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                              <label for="taxi">Change order status</label>
                              <select name="status" class="form-control" id="taxi">
                                <option value="Open">Open</option>
                                <option value="On Hold">On Hold</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Closed">Closed</option>
                              </select>
                            </fieldset>
                        </div>
                        
                      </div>
                    </div>
                    <div class="form-actions">
                        <input type="text" name="data_id" value="0">
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
                        url: '{{ route('admin.order.taxi.delete') }}',
                        data: {
                            'data_id': delteteDataId,
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
        $('[name="data_id"]').val(editDataId);
    });

</script>
@endsection