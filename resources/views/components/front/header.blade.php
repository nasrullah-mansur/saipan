<!-- Header start -->
<header class="header">
    @if(headerData())
    @if (headerData()->status == 'enable')
    <div class="top">
        <div class="container">
            <div class="top-content">
                <div class="phone">
                    <ul>
                        @if (contact()) 
                        <li><a href="tel:{{ contact() ? contact()->phone : '' }}"><i class="fas fa-phone-alt"></i> {{ contact() ? contact()->phone : '' }}</a></li>
                        <li><a href="mailto:{{ contact() ? contact()->email : '' }}"><i class="far fa-envelope"></i> {{ contact() ? contact()->email : '' }}</a></li>
                        @endif
                    </ul>
                </div>
                <div class="open">
                    <p>{!! headerData()->opening_hours !!}</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
    <!-- Main menu -->
    <div class="main-menu">
        <div class="container">
            <div class="main-menu-content">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset( appearance() ? appearance()->logo : 'front/images/logo.svg') }}" alt="logo">
                    </a>
                </div>
                <div class="list">
                    <ul>
                        <li><a class="{{ Route::is('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Home</a></li>
                        <li><a class="{{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                        <li><a class="{{ Route::is('taxi', 'taxi.single') ? 'active' : '' }}" href="{{ route('taxi') }}">Taxi</a></li>
                        <li><a class="{{ Route::is('saipan', 'saipan.single') ? 'active' : '' }}" href="{{ route('saipan') }}">Saipan</a></li>
                        <li><a class="{{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="book-btn">
                    <a data-bs-toggle="modal" data-bs-target="#bookModal" href="#">Book Now</a>
                </div>
                <div class="mobile">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header end -->