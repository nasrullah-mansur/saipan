<!-- BEGIN VENDOR JS-->
<script src="{{ asset('back/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('back/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{ asset('back/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/js/scripts/customizer.js') }}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('back/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{ asset('back/vendors/js/forms/tags/form-field.js') }}" type="text/javascript"></script>

<script src="{{ asset('back/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>

@stack('scripts')

@yield('custom_js')

@if(Session::has('success'))
<script>
    swal("Good job!", "{{ Session::get('success') }}", "success");
</script>
@endif

@if ($errors->any())
    <script>
        swal("Sorry!", "Something was wrong, Please check cearfully", "warning");
    </script>
@endif