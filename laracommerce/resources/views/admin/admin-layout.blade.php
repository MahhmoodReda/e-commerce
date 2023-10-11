@include('admin.inc.header')
<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
@include('admin.inc.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
@include('admin.inc.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
@yield('body')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
@include('admin.inc.footer')