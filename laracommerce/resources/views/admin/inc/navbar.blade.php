<nav class="flex-row p-0 navbar col-lg-12 col-12 fixed-top d-flex">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('admin/images') }}/logo.svg"
                    alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('admin/images') }}/logo-mini.svg"
                    alt="logo" /></a>
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
            <li class="nav-item nav-search d-none d-lg-block w-100">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search now" aria-label="search"
                        aria-describedby="search">
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown me-1">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                    id="messageDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mx-0 mdi mdi-message-text"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                    <p class="float-left mb-0 font-weight-normal dropdown-header">Messages</p>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="{{ asset('admin/images') }}/faces/face4.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="flex-grow item-content">
                            <h6 class="ellipsis font-weight-normal">David Grey
                            </h6>
                            <p class="mb-0 font-weight-light small-text text-muted">
                                The meeting is cancelled
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="{{ asset('admin/images') }}/faces/face2.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="flex-grow item-content">
                            <h6 class="ellipsis font-weight-normal">Tim Cook
                            </h6>
                            <p class="mb-0 font-weight-light small-text text-muted">
                                New product launch
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="{{ asset('admin/images') }}/faces/face3.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="flex-grow item-content">
                            <h6 class="ellipsis font-weight-normal"> Johnson
                            </h6>
                            <p class="mb-0 font-weight-light small-text text-muted">
                                Upcoming board meeting
                            </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown me-4">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"
                    id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mx-0 mdi mdi-bell"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                    <p class="float-left mb-0 font-weight-normal dropdown-header">Notifications</p>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <div class="item-icon bg-success">
                                <i class="mx-0 mdi mdi-information"></i>
                            </div>
                        </div>
                        <div class="item-content">
                            <h6 class="font-weight-normal">Application Error</h6>
                            <p class="mb-0 font-weight-light small-text text-muted">
                                Just now
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <div class="item-icon bg-warning">
                                <i class="mx-0 mdi mdi-settings"></i>
                            </div>
                        </div>
                        <div class="item-content">
                            <h6 class="font-weight-normal">Settings</h6>
                            <p class="mb-0 font-weight-light small-text text-muted">
                                Private message
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <div class="item-icon bg-info">
                                <i class="mx-0 mdi mdi-account-box"></i>
                            </div>
                        </div>
                        <div class="item-content">
                            <h6 class="font-weight-normal">New user registration</h6>
                            <p class="mb-0 font-weight-light small-text text-muted">
                                2 days ago
                            </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <i class="mdi mdi-account-circle"></i>
                    <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
