@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Slider list</h4>
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
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush

@section('custom_js')
<script>
    // Delete Data;
    $('.table-area').on('click', '.delete-data', function(e) {
        console.log('ok');
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
                        url: '{{ route('admin.slider.delete') }}',
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
</script>
@endsection