    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Invoice</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <style>
                body {
                    background-color: #F6F6F6;
                    margin: 0;
                    padding: 0;
                }

                h1,
                h2,
                h3,
                h4,
                h5,
                h6 {
                    margin: 0;
                    padding: 0;
                }

                p {
                    margin: 0;
                    padding: 0;
                }

                .container {
                    width: 80%;
                    margin-right: auto;
                    margin-left: auto;
                }

                .brand-section {
                    background-color: #0d1033;
                    padding: 10px 40px;
                }

                .logo {
                    width: 50%;
                }

                .row {
                    display: flex;
                    flex-wrap: wrap;
                }

                .col-6 {
                    width: 50%;
                    flex: 0 0 auto;
                }

                .text-white {
                    color: #fff;
                }

                .company-details {
                    float: right;
                    text-align: right;
                }

                .body-section {
                    padding: 16px;
                    border: 1px solid gray;
                }

                .heading {
                    font-size: 20px;
                    margin-bottom: 08px;
                }

                .sub-heading {
                    color: #262626;
                    margin-bottom: 05px;
                }

                table {
                    background-color: #fff;
                    width: 100%;
                    border-collapse: collapse;
                }

                table thead tr {
                    border: 1px solid #111;
                    background-color: #f2f2f2;
                }

                table td {
                    vertical-align: middle !important;
                    text-align: center;
                }

                table th,
                table td {
                    padding-top: 08px;
                    padding-bottom: 08px;
                }

                .table-bordered {
                    box-shadow: 0px 0px 5px 0.5px gray;
                }

                .table-bordered td,
                .table-bordered th {
                    border: 1px solid #dee2e6;
                }

                .text-right {
                    text-align: end;
                }

                .w-20 {
                    width: 20%;
                }

                .float-right {
                    float: right;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <br><br>
                <div class="brand-section">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="text-white">LARACOMMERCE</h1>
                        </div>

                    </div>
                </div>

                <div class="body-section">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="heading">Invoice No.: {{ $invoice->id }}</h2>
                            <p class="sub-heading">Tracking No.: <span
                                    class="text-primary">{{ $invoice->tracking_no }}</span></span> </p>
                            <p class="sub-heading">Order Date: <span
                                    class="text-primary">{{ $invoice->created_at->format('d-m-Y') }}</span> </p>
                            <p class="sub-heading">Email Address: <span class="text-primary">{{ $invoice->email }}</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <p class="sub-heading">Full Name: <span class="text-primary">{{ $invoice->name }}</span></p>
                            <p class="sub-heading">Address: <span class="text-primary">{{ $invoice->address }}</span></p>
                            <p class="sub-heading">Phone Number: <span class="text-primary">{{ $invoice->phone }}</span></p>
                            <p class="sub-heading">City,State,Pincode: <span
                                    class="text-primary">{{ $invoice->pincode }}</span></p>
                        </div>
                    </div>
                </div>

                <div class="body-section">
                    <h3 class="heading">Ordered Items</h3>
                    <br>
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th class="w-20 text-center">Product</th>
                                <th class="w-20 text-center">Price</th>
                                <th class="w-20 text-center">Quantity</th>
                                <th class="w-20 text-center">Grandtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->orderItems as $product)


                            <tr>
                                <td>{{ $product->product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price * $product->quantity }}</td>
                            </tr>

                            @endforeach
                            <tr>
                                <td colspan="3" class="text-left">
                                    <h4> Grand Total</h4>
                                </td>
                                @php
                                $grandTotal= 0 ;
                                foreach ($invoice->orderItems as $product)
                                {
                                $grandTotal += $product->price * $product->quantity;
                                }
                                @endphp
                                <td>
                                    <h4> {{ $grandTotal }}</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <h3 class="heading">Payment Status: <span class="text-primary">{{ $invoice->status_message }}</span>
                    </h3>
                    <h3 class="heading">Payment Mode: <span
                            class="text-primary">{{ $invoice->payment_type == '0' ? 'cash on delivery' : 'pay online' }}</span>
                    </h3>
                </div>
            </div>

        </body>

    </html>


Thanks,<br>
{{ config('app.name') }}
