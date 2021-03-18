<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar ">
    <div class="sidebar-img">
        <a class="navbar-brand" href="{{route('client.home.index')}}"><img alt="..." class="navbar-brand-img main-logo"
                src="{{asset('assets/admin/img/brand/logo-dark.png')}}"> <img alt="..." class="navbar-brand-img logo"
                src="{{asset('assets/admin/img/brand/logo.png')}}"></a>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item active" data-toggle="slide" href="#"><i
                        class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span><i
                        class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{route('admin.dashboard.index')}}">Dashboard</a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-edit"></i><span
                        class="side-menu__label">Currency</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{route('admin.currency.index')}}" class="slide-item">List Currency</a>
                    </li>
                    <li>
                        <a href="{{route('admin.currency.create')}}" class="slide-item">Add Currency</a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-map"></i><span
                        class="side-menu__label">Payment Method</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{route('admin.payment.method.index')}}" class="slide-item">List Payment Method</a>
                    </li>
                    <li>
                        <a href="{{route('admin.payment.method.create')}}" class="slide-item">Add Payment Method</a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-map"></i><span
                        class="side-menu__label">Payment Fee</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{route('admin.fee.index')}}" class="slide-item">Payment Fee</a>
                    </li>
                </ul>
            </li>
            
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-file-text"></i><span
                    class="side-menu__label">Exchange</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{route('admin.exchange.index')}}" class="slide-item">List Exchange</a>
                    </li>
                </ul>
            </li>

            
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span
                    class="side-menu__label">User</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{route('admin.user.index')}}" class="slide-item">List User</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i
                        class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Pages</span><i
                        class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="user-profile.html" class="slide-item">User Profile</a>
                    </li>
                    <li>
                        <a href="email-inbox.html" class="slide-item">Email Inbox</a>
                    </li>
                    <li>
                        <a href="email-compose.html" class="slide-item">Email</a>
                    </li>
                    <li>
                        <a href="gallery.html" class="slide-item">Gallery</a>
                    </li>
                    <li>
                        <a href="invoice.html" class="slide-item">Invoice</a>
                    </li>
                    <li>
                        <a href="pricing.html" class="slide-item">Pricing Tables</a>
                    </li>
                    <li>
                        <a href="empty.html" class="slide-item">Empty</a>
                    </li>
                    <li>
                        <a href="under-construction.html" class="slide-item">Under Construction</a>
                    </li>
                    <li>
                        <a href="400.html" class="slide-item">Page 400</a>
                    </li>
                    <li>
                        <a href="404.html" class="slide-item">Page 404</a>
                    </li>
                    <li>
                        <a href="500.html" class="slide-item">Page 500</a>
                    </li>
                    <li>
                        <a href="505.html" class="slide-item">Page 505</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i
                        class="side-menu__icon fe fe-italic"></i><span class="side-menu__label">Icons</span><i
                        class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="icons-feather.html" class="slide-item">Feather Icons</a>
                    </li>
                    <li>
                        <a href="icons-fontawesome.html" class="slide-item">Font Awesome Icons</a>
                    </li>
                    <li>
                        <a href="icons-ion.html" class="slide-item">Ion Icons</a>
                    </li>
                    <li>
                        <a href="icons-materialdesign.html" class="slide-item">Materialdesign Icons</a>
                    </li>
                    <li>
                        <a href="icons-nucleo.html" class="slide-item">Nucleo Icons</a>
                    </li>
                    <li>
                        <a href="icons-pe7.html" class="slide-item">pe7 Icons</a>
                    </li>
                    <li>
                        <a href="icons-simpleline.html" class="slide-item">Simpleline Icons</a>
                    </li>
                    <li>
                        <a href="icons-themify.html" class="slide-item">Themify Icons</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i
                        class="side-menu__icon fe fe-underline"></i><span class="side-menu__label">Ui Elements</span><i
                        class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="accordion.html" class="slide-item">Accordion</a>
                    </li>
                    <li>
                        <a href="alerts.html" class="slide-item">Alerts</a>
                    </li>
                    <li>
                        <a href="badges.html" class="slide-item">Badges</a>
                    </li>
                    <li>
                        <a href="buttons.html" class="slide-item">Buttons</a>
                    </li>
                    <li>
                        <a href="carousel.html" class="slide-item">Carousels</a>
                    </li>
                    <li>
                        <a href="colors.html" class="slide-item">Colors</a>
                    </li>
                    <li>
                        <a href="dropdowns.html" class="slide-item">Drop downs</a>
                    </li>
                    <li>
                        <a href="grids.html" class="slide-item">Grids</a>
                    </li>
                    <li>
                        <a href="modal.html" class="slide-item">Modal</a>
                    </li>
                    <li>
                        <a href="navigation.html" class="slide-item">Navigation</a>
                    </li>
                    <li>
                        <a href="pagination.html" class="slide-item">Pagination</a>
                    </li>
                    <li>
                        <a href="popovers.html" class="slide-item">Popovers</a>
                    </li>
                    <li>
                        <a href="progress.html" class="slide-item">Progress</a>
                    </li>
                    <li>
                        <a href="tabs.html" class="slide-item">Tabs</a>
                    </li>
                    <li>
                        <a href="tooltip.html" class="slide-item">Tooltip</a>
                    </li>
                    <li>
                        <a href="typography.html" class="slide-item">Typography</a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-user"></i><span
                        class="side-menu__label">Account</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="login.html" class="slide-item">Login</a>
                    </li>
                    <li>
                        <a href="register.html" class="slide-item">Register</a>
                    </li>
                    <li>
                        <a href="forgot.html" class="slide-item">Forgot password</a>
                    </li>
                    <li>
                        <a href="lockscreen.html" class="slide-item">Lock screen</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i
                        class="side-menu__icon fe fe-shopping-cart"></i><span
                        class="side-menu__label">E-commerce</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a href="shop.html" class="slide-item">Products</a>
                    </li>
                    <li>
                        <a href="cart.html" class="slide-item">Shopping Cart</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="side-menu__item" href="https://themeforest.net/user/sprukosoft/portfolio"><i
                        class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Help &
                        Support</span></a>
            </li> --}}
        </ul>
    </div>
</aside>
