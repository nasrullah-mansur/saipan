<!-- Scripts -->
<script src="{{ asset('front/js/jquery.2.2.4.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/js/slick.min.js') }}"></script>
<script src="{{ asset('front/js/select2.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('front/js/wow.min.js') }}"></script>
<script src="{{ asset('front/js/venobox.min.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>

@yield('custom_js')

@if (custom_js())
    <script>{!! custom_js() !!}</script>
@endif