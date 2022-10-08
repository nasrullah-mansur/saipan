<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  @include('components.back.head')
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  @include('components.back.header')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('components.back.menu')

  <div class="app-content content">
    <div class="content-wrapper">
        
        @yield('content')

    </div>
  </div>

  
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('components.back.footer')

  @include('components.back.script')
  
</body>
</html>