@extends('admin.admin-layout')

@section('body')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="me-md-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">your analitcs dashboard template.</p>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-secondary text-white mb-3 text-center">
                        <label for="">Total Orders</label>
                        <h1>{{ $totalOrders }}</h1>
                        <a href="{{ route('admin.orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3 text-center">
                        <label for="">Today orders</label>
                        <h1>{{ $toDayOrders }}</h1>
                        <a href="{{ route('admin.orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3 text-center">
                        <label for="">This Month Orders</label>
                        <h1>{{ $thisMonthOrders }}</h1>
                        <a href="{{ route('admin.orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3 text-center">
                        <label for="">This Year Orders</label>
                        <h1>{{ $thisYearOrders }}</h1>
                        <a href="{{ route('admin.orders') }}" class="text-white">View</a>
                    </div>
                </div>
                <br><hr>
                <div class="col-md-3">
                    <div class="card card-body bg-secondary text-white mb-3 text-center">
                        <label for="">Total Products</label>
                        <h1>{{ $totalProducts }}</h1>
                        <a href="{{ route('products.index') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3 text-center">
                        <label for="">Total Categories</label>
                        <h1>{{ $totalCategories }}</h1>
                        <a href="{{ route('category.index') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3 text-center">
                        <label for="">Total Brands</label>
                        <h1>{{ $totalBrands }}</h1>
                        <a href="{{ route('brand.index') }}" class="text-white">View</a>
                    </div>
                </div>
                <br>
                <hr>
                <div class="col-md-3">
                    <div class="card card-body bg-secondary text-white mb-3 text-center">
                        <label for="">All Users</label>
                        <h1>{{ $totalAllUsers }}</h1>
                        <a href="{{ route('admin.all-users') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3 text-center">
                        <label for="">Total Users</label>
                        <h1>{{ $totalUsers }}</h1>
                        <a href="{{ route('admin.all-users') }}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3 text-center">
                        <label for="">Total Admins</label>
                        <h1>{{ $totalAdmins }}</h1>
                        <a href="{{ route('admin.all-users') }}" class="text-white">View</a>
                    </div>
                </div>
                <br> <hr>

            </div>
        </div>
    </div>
@endsection