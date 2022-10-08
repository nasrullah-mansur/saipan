<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ appearance() ? appearance()->title : 'AP TAXI SAIPAN' }} </title>

@if (meta())
    {!! meta()->content !!}
@endif

<link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/slick.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link href="{{ asset('front/css/select2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('front/css/jquery.datetimepicker.min.css') }}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/style-2.css') }}">
<link rel="stylesheet" href="{{ asset('front/css/venobox.min.css') }}">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset(appearance() ? appearance()->favicon : 'front/images/favicon.png') }}" >

@if (custom_css())
    <style>
        {!! custom_css() !!}
    </style>
@endif