@extends('user.user-layout')
@section('title')
    {{ 'orders Page' }}
@endsection
@section('desc')
    {{ 'This is the order page of our website' }}
@endsection
@section('keyword')
    {{ 'home, about us , contact us, ecommerce , sun glasses , t-shirts' }}
@endsection
@section('body')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <br><br><br><br>
                        <h4 class="mb-4">
                            My Orders
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Tracking No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Payment Type</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $order->id }}</th>
                                            <td>{{ $order->tracking_no }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->payment_type == '0' ? 'cash on delivery' : 'pay online' }}</td>
                                            <td>{{ $order->created_at->format('d-m-y') }}</td>
                                            <td>{{ $order->status_message }}</td>
                                            <td>
                                                <a href="{{ route('user.show-order', $order->id) }}"
                                                    class="btn btn-primary btn-sm">view</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7"> No Orders Found</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                            <hr>
                            <br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
