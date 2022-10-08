<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
        <ul class="navigation navigation-main">
            <li class="nav-item {{ Route::is('dashboard') ? 'active open' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ Route::is('admin.header') ? 'active open' : '' }}">
                <a href="{{ route('admin.header') }}">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Header</span>
                </a>
            </li>

            <li class="nav-item {{ Route::is('admin.footer') ? 'active open' : '' }}">
                <a href="{{ route('admin.footer') }}">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Footer</span>
                </a>
            </li>

            <li class="nav-item {{ Route::is('contact.index','contact.index.*') ? 'active open' : '' }}">
                <a href="{{ route('contact.index') }}">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Contact</span>
                </a>
            </li>

            <li class="nav-item {{ Route::is(['admin.order.taxi', 'admin.order.saipan']) ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Order</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.order.taxi') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.order.taxi') }}">Taxi</a></li>
                    <li class="{{ Route::is('admin.order.saipan') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.order.saipan') }}">Saipan</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is(['admin.pick.up', 'admin.drop.off', 'admin.taxi', 'admin.taxi.*']) ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Taxi</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.pick.up') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.pick.up') }}">Pick up location</a></li>
                    <li class="{{ Route::is('admin.drop.off') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.drop.off') }}">Drop off location</a></li>
                    <li class="{{ Route::is('admin.taxi') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.taxi') }}">All Taxis</a></li>
                    <li class="{{ Route::is('admin.taxi.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.taxi.create') }}">Create Taxi</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is('admin.saipan.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Saipan</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.saipan') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.saipan') }}">All Saipan</a></li>
                    <li class="{{ Route::is('admin.saipan.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.saipan.create') }}">Create Saipan</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is(['admin.slider', 'admin.slider.*']) ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Slider</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.slider') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.slider') }}">All Items</a></li>
                    <li class="{{ Route::is('admin.slider.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.slider.create') }}">Add Item</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is('admin.testimonial.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Testimonial</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.testimonial.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.testimonial.index') }}">All Testimonial</a></li>
                    <li class="{{ Route::is('admin.testimonial.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.testimonial.create') }}">Add Testimonial</a></li>
                    <li class="{{ Route::is('admin.testimonial.section') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.testimonial.section') }}">Testimonial Section</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is('admin.gallery.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Gallery</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.gallery.taxi.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.gallery.taxi.index') }}">Taxi Gallery</a></li>
                    <li class="{{ Route::is('admin.gallery.saipan.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.gallery.saipan.index') }}">Saipan Gallery</a></li>
                    <li class="{{ Route::is('admin.gallery.footer.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.gallery.footer.index') }}">Footer Gallery</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is(['admin.user.*']) ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Users</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.user') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.user') }}">All Users</a></li>
                    <li class="{{ Route::is('admin.user.contact') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.user.create') }}">Add User</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is('admin.page.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Pages</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.page.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.page.index') }}">Home</a></li>
                    <li class="{{ Route::is('admin.page.about') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.page.about') }}">About</a></li>
                    <li class="{{ Route::is('admin.page.taxi') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.page.taxi') }}">Taxi</a></li>
                    <li class="{{ Route::is('admin.page.saipan') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.page.saipan') }}">Saipan</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is('admin.section.about') ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Sections</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.section.about') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.section.about') }}">About</a></li>
                    <li class="{{ Route::is('section.contact') ? 'active' : '' }}"><a class="menu-item" href="{{ route('section.contact') }}">Contact</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is(['setting.*', 'admin.social',]) ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Setting</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('setting.appearance') ? 'active' : '' }}"><a class="menu-item" href="{{ route('setting.appearance') }}">Appearance</a></li>
                    <li class="{{ Route::is('admin.social') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.social') }}">Socials</a></li>
                </ul>
            </li>

            <li class="nav-item {{ Route::is(['admin.meta', 'sender.email', 'custom.css', 'custom.js']) ? 'active open' : '' }}">
                <a href="javascript:void(0);">
                    <i class="ft-edit"></i>
                    <span class="menu-title">Advance</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Route::is('admin.meta') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.meta') }}">Meta</a></li>
                    <li class="{{ Route::is('sender.email') ? 'active' : '' }}"><a class="menu-item" href="{{ route('sender.email') }}">Email Info</a></li>
                    <li class="{{ Route::is('custom.css') ? 'active' : '' }}"><a class="menu-item" href="{{ route('custom.css') }}">Custom CSS</a></li>
                    <li class="{{ Route::is('custom.js') ? 'active' : '' }}"><a class="menu-item" href="{{ route('custom.js') }}">Custom JS</a></li>
                </ul>
            </li>
            <li class="pb-5"></li>
            
        </ul>
    </div>
</div>
