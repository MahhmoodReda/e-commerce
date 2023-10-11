@extends('admin.admin-layout')
@section('body')
@include('sessions.success')
@include('sessions.error')
    <div class="container">
        <form action="{{ route('products.create') }}" method="get">
            @csrf
            <button class="mt-2 btn btn-primary mt-xl-0" type="submit">Add Product</button>
        </form><br><br>
        <div class="card-header">
            <h2>Products</h2>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $products as $product )
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <form action="{{ route('products.edit',$product->id) }}"
                                                method="get">
                                                @csrf
                                                <button class="btn btn-success" type="submit">Edit</button>
                                            </form>
                                            <form action="{{ route('products.destroy',$product->id) }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <button onclick="return confirm('Are You Sure , you want to delete this ?')" class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Products Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
