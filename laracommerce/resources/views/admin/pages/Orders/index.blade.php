@extends('admin.admin-layout')
@section('body')
    <div class="card-header">
        <h2>Orders</h2>
        <br>

        <form action="{{ route('admin.orders') }}" method="get">
            @csrf
            <div class="col-md-6">
                <input type="date" name="date" value="{{ Request::get('date') }}" class="form-group">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
        <div class="card">
            <div class="card-body">
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
                                        <a href="{{ route('admin.show-order', $order->id) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
