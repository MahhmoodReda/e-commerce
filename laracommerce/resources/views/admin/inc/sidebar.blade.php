<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="{{ route('admin.orders') }}"
                >
                <i class="mdi mdi-cash menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  >
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>
            <div >
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('category.create') }}">Add Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">View Categories</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item" >
            <a class="nav-link" >
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
            <div >
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.create') }}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">View Products</a>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('brand.index') }}">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.all-users') }}">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" >
                <i class="mdi mdi-map menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
            <div >
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('slider.index') }}"> View Slider </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('slider.create') }}"> Add Slider </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>
    </ul>
</nav>





