@if (footer())
<!-- Footer start -->
<footer class="footer {{ Route::is('taxi') ? 'mt-0' : '' }}">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-logo">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset(footer()->image ? footer()->image : 'front/images/footer-logo.png') }}" alt="logo">
                        </a>
                        <p>{!! footer()->content !!}</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-list">
                        <h3>Usefull Links</h3>
                        <ul>
                            <li><a href="{{ route('welcome') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('taxi') }}">Taxi</a></li>
                            <li><a href="{{ route('saipan') }}">Saipan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-list">
                        <h3>About Us</h3>
                        <ul>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="#">Privacy & policy</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="#">Faq</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="gallery">
                        <ul class="footer-gallery">
                            @foreach (footerGallery() as $footer_gall)
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset($footer_gall->image) }}" alt="{{ $footer_gall->alt }}">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>{!! footer()->copyright !!}</p>
    </div>
</footer>
<!-- Footer end -->
@endif