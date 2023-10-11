<div>
    <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
        @auth

        data-notify="{{ "$countCart" }}">
        @endauth
        <i class="zmdi zmdi-shopping-cart"></i>
    </a>


        <!-- Cart -->
        <div class="wrap-header-cart js-panel-cart">
            <div class="s-full js-hide-cart"></div>

            <div class="header-cart flex-col-l p-l-65 p-r-25">
                <div class="header-cart-title flex-w flex-sb-m p-b-8">
                    <span class="mtext-103 cl2">
                        Your Cart
                    </span>

                    <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                        <i class="zmdi zmdi-close"></i>
                    </div>
                </div>

                <div class="header-cart-content flex-w js-pscroll">
                    @auth
                        <ul class="w-full header-cart-wrapitem">
                            @forelse ($cartProducts as $pro)
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img">
                                    <img src="{{ asset("storage/".$pro->product->productImage[0]->image) }}" style="width:60px;height:60px" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{ $pro->product->name }}
                                    </a>

                                    <span class="header-cart-item-info">
                                        {{ $pro->quantity }} x  {{ $pro->product->selling_price }}
                                    </span>
                                </div>
                                @php
                                $totalPrice += $pro->product->selling_price * $pro->quantity;
                            @endphp
                            </li>
                            @empty
                                <h2>{{ "No Products Found" }}</h2>
                            @endforelse


                        </ul>

                        <div class="w-full">
                            <div class="w-full header-cart-total p-tb-40">
                                Total: $ {{ $totalPrice  }}
                            </div>

                            <div class="w-full header-cart-buttons flex-w">
                                <a href="{{ route('user.cart') }}"
                                    class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                    View Cart
                                </a>

                                <a href="{{ route('user.checkout') }}"
                                    class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    @endauth
                    @guest
                    <div class="header-cart-item-txt p-t-8">
                        <h3 >
                            Only Authorized Users Can Access Cart
                        </h3>

                        <br>

                        <span class="header-cart-item-info">
                            you should login first
                        </span>

                    </div>
                        <button onclick="location.href='{{ route('login') }}'" class=" btn btn-primary">
                            Login from here
                        </button>
                    @endguest
                </div>
            </div>
        </div>
</div>
