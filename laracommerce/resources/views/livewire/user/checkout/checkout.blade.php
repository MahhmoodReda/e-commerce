<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            <div class="row">
                <div class="mb-4 col-md-12">
                    <div class="p-3 bg-white shadow">
                        @foreach ($cartProducts as $pro)
                            @php
                                $totalPrice += $pro->product->selling_price * $pro->quantity;
                            @endphp
                        @endforeach
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-right">${{ $totalPrice }}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br />
                    </div>
                </div>
                @if ($totalPrice != '0')
                    <div class="col-md-12">
                        <div class="p-3 bg-white shadow">
                            <h4 class="text-primary">
                                Basic Information
                            </h4>
                            <hr>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" name="name" id="name" wire:model='name'
                                        class="form-control" />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>Phone Number</label>
                                    <input type="number" id="phone" name="phone" wire:model='phone'
                                        class="form-control" />
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>Email Address</label>
                                    <input type="email" id="email" name="email" wire:model='email'
                                        class="form-control" />
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>Pin-code (Zip-code)</label>
                                    <input type="number" id="pincode" name="pincode" wire:model='pincode'
                                        class="form-control" />
                                    @error('pincode')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label>Full Address</label>
                                    <textarea name="address" id="address" class="form-control" wire:model='address' rows="2"></textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12" wire:ignore>
                                    <label>Select Payment Mode: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab"
                                                data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button"
                                                role="tab" aria-controls="cashOnDeliveryTab"
                                                aria-selected="true">Cash on Delivery</button>
                                            <button class="nav-link fw-bold" id="onlinePayment-tab"
                                                data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button"
                                                role="tab" aria-controls="onlinePayment"
                                                aria-selected="false">Online Payment</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel"
                                                aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Cash on Delivery Mode</h6>
                                                <hr />
                                                <button type="button" id="cash" wire:click='CashOnDelivery'
                                                    class="btn btn-primary js-checkout-detail">
                                                    <span>
                                                        Place Order (Cash on
                                                        Delivery)
                                                    </span>
                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                <hr />
                                                <button type="button" id="online" wire:click='payOnline'
                                                    class="btn btn-warning js-checkout-detail">
                                                    <span>
                                                        PayOnline (Pay Wiyh PayPal)
                                                    </span>
                                                </button>

                                                <div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="m-5 text-center shadow card card-body">
                            <h4>
                                No items in cart to checkout
                            </h4>
                            <br>
                            <a href="{{ route('user.shop') }}" class="btn btn-warning">shop now</a>
                        </div>
                        <br><br><br>
                @endif
            </div>


        </div>
    </div>
</div>

