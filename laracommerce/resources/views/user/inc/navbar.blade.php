<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="container h-full content-topbar flex-sb-m">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
                @auth
                <div class="h-full right-top-bar flex-w">
                    <a href="{{ route('logout') }}" class="flex-c-m trans-04 p-lr-25">
                        Logout
                    </a>
                @endauth

                @guest()
                    <div class="h-full right-top-bar flex-w">
                        <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="flex-c-m trans-04 p-lr-25">
                            Sign Up
                        </a>
                    </div>
                @endguest

            </div>
        </div>
        <div class="wrap-menu-desktop">
            <nav class="container limiter-menu-desktop">

                <!-- Logo desktop -->
                <a href="{{ route('user.home') }}" class="logo">
                    <img src="{{ asset('storage/logo-01.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu ">
                        <li>
                            <a class="active-menu" href="{{ route('user.home') }}">Home</a>
                        </li>

                        <li>
                            <a href="{{ route('user.shop') }}">Shop</a>

                        </li>

                        <li>
                            <a href="{{ route('user.orders') }}">Orders</a>
                        </li>

                        <li>
                            <a href="about.html">About</a>
                        </li>

                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    @auth

                    <livewire:user.cart.cart-count/>
                    <livewire:user.wishlist.wish-list-count />
                    @endauth


                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="{{ asset('user/images') }}/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <a href="" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti "
                data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </a>
            <a href="" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti "
                data-notify="2">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="h-full right-top-bar flex-w">
                    <a href="{{ route('login') }}" class="flex-c-m p-lr-10 trans-04">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="flex-c-m p-lr-10 trans-04">
                        Sign Up
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{ route('user.home') }}">Home</a>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="{{ route('user.shop') }}">Shop</a>
            </li>

            <li>
                <a href="blog.html">Blog</a>
            </li>

            <li>
                <a href="about.html">About</a>
            </li>

            <li>
                <a href="contact.html">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('user/images') }}/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form action="{{ route('user.search') }}" method="GET" class="wrap-search-header flex-w p-l-15">
                <button type="submit" class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search"  placeholder="Search...">
            </form>
        </div>
    </div>



</header>
