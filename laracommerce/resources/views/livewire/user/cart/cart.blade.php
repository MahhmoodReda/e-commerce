<div>
    <!-- Shoping Cart -->
    <br><br><br>
    <div>
        <div class="cart-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wishlist">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th width="30%">Product Name</th>
                                        <th width="15%">Unit Price</th>
                                        <th width="25%">Quantity</th>
                                        <th width="15%">Total price</th>
                                        <th width="15%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cartProducts as $cartProduct)
                                        <tr>
                                            <td width="30%">
                                                <div class="display-flex align-center">
                                                    <div class="img-product">
                                                        <img src="{{ asset('storage/' . $cartProduct->product->ProductImage[0]->image) }}"
                                                            alt="" class="mCS_img_loaded">
                                                    </div>
                                                    <div class="name-product">
                                                        <a class="js-name-detail"
                                                            href="{{ route('user.productDetails', $cartProduct->product_id) }}"
                                                            class
                                                            style="text-decoration:none; color:inherit;">{{ $cartProduct->product->name }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="15%" class="price">${{ $cartProduct->product->selling_price }}
                                            </td>
                                            <td width="15%">
                                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                    <button class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                                        wire:click='decrement({{ $cartProduct->id }})'>
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </button>
                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        readonly wire:model='quantity' name="num-product"
                                                        value="{{ $cartProduct->quantity }}">
                                                    <button  class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                                        wire:click='increment({{ $cartProduct->id }})'>
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td width="15%" class="price">${{ $cartProduct->product->selling_price * $cartProduct->quantity }}
                                            </td>
                                            @php
                                                $totalPrice += $cartProduct->product->selling_price * $cartProduct->quantity;
                                            @endphp
                                            <td width="15%">
                                                <a href=""
                                                    wire:click.prevent='deleteFromCart({{ $cartProduct->id }})'
                                                    class="btn btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @empty
                                        <div style="height: 100px">
                                            <tr>
                                                <td width="45%">
                                                    <div class="display-flex align-center">
                                                        <div class="name-product">
                                                            <span style="text-decoration:none; color:inherit;">
                                                                <h2>No Products Fpund</h2>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mt-3 col-md-8 my-md-auto">
                        <h4>
                            Get the best offers & deals <a href="{{ route('user.shop') }}">shop now</a>
                        </h4>
                    </div>
                    <div class="mt-3 col-md-4">
                        <div class="p-3 shadow-sm bg-zinc-500">
                            <h4>Total:
                                <span class="float-right">${{ $totalPrice }}</span>
                            </h4>
                            <hr>
                            <a href="{{ route('user.checkout') }}" class="btn btn-warning w-100">checkout</a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

</div>
