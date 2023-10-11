@extends('user.user-layout')
@section('title')
{{ 'order-show Page' }}
@endsection
@section('desc')
{{ 'This is the order-show page of our website' }}
@endsection
@section('keyword')
{{ 'home, about us , contact us, ecommerce , sun glasses , t-shirts' }}
@endsection
@section('body')
<div class="py-3 py-md-5">
    <div class="container">
        <br><br>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="p-3 bg-white shadow">
                    <br><br>
                    <h4 class="mb-4">
                        My Order Detail
                    </h4>
                    <hr>
                    <h6>Order Id : {{ $order->id }}</h6><br>
                    <h6>Tracking No : {{ $order->tracking_no }}</h6><br>
                    <h6>Order Date : {{ $order->created_at->format('d-m-y') }}</h6><br>
                    <h6>Payment type : {{ $order->payment_type == '0' ? 'cash on delivery' : 'pay online' }}</h6><br>
                    <h6 class="p-2 border text-success">Status : <span class="text-uppercase">
                            {{ $order->status_message }}</span></h6><br>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 bg-white shadow">
                    <br><br>
                    <h4 class="mb-4">
                        User Detail
                    </h4>
                    <hr>
                    <h6>Name : {{ $order->name }}</h6><br>
                    <h6>Phone : {{ $order->phone }}</h6><br>
                    <h6>Email : {{ $order->email }}</h6><br>
                    <h6>Pin Code : {{ $order->pincode }}</h6><br>
                    <h6>Address : {{ $order->address }}</h6><br>
                </div>
            </div>
        </div>
        <hr>
        <br>
        <h5>Order Items</h5>
        <br>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Item Id</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $order_item)
                    <tr>
                        <th>{{ $order_item->product_id }}</th>
                        <td><img src="{{ asset('storage/' . $order_item->product->productImage[0]->image) }}"
                                style="width : 50px ; height : 50px" alt=""></td>
                        <td>{{ $order_item->price }}</td>
                        <td>{{ $order_item->quantity }}</td>
                        <td>{{ $order_item->price * $order_item->quantity }} </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <hr>
            <br><br><br><br>
        </div>
    </div>
</div>
@endsection