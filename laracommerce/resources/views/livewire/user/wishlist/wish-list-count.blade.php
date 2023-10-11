<div>

    <div>
        <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-wishlist"
            data-notify="{{ $countWishList }}">
            <i class="zmdi zmdi-favorite-outline"></i>
        </a>
    </div>

    <!-- Wishlist -->
    <div class="wrap-header-wishlist js-panel-wishlist">
        <div class="s-full js-hide-wishlist"></div>

        <div class="header-wishlist flex-col-l p-l-65 p-r-25">
            <div class="header-wishlist-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Wishlist
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-wishlist">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-wishlist-content flex-w js-pscroll">
                @auth
                    <ul class="w-full header-wishlist-wrapitem">
                        @forelse ($wishlists as $wishlist)
                            <li class="header-wishlist-item flex-w flex-t m-b-12">
                                <div class="header-wishlist-item-img">
                                    <img src="{{ asset('storage/' . $wishlist->product->ProductImage[0]->image) }}" style="width:60px;height:60px" alt="IMG">
                                </div>

                                <div class="header-wishlist-item-txt p-t-8">
                                    <a href="{{ route('user.productDetails', $wishlist->product->id) }}" class="header-wishlist-item-name m-b-18 hov-cl1 trans-04">
                                        {{ $wishlist->product->name}}
                                    </a>

                                    <span class="header-wishlist-item-info">
                                        {{ $wishlist->product->selling_price}}
                                    </span>
                                </div>
                            </li>
                        @empty
                            <div class="header-wishlist-title flex-w flex-sb-m p-b-8">
                                <span class="mtext-103 cl2">
                                    No Products Found
                                </span>
                            </div>
                        @endforelse


                    </ul>

                    <div class="w-full">


                        <div class="w-full header-wishlist-buttons flex-w">
                            <a href="{{ route('user.wishlist') }}"
                                class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                View wishlist
                            </a>


                        </div>
                    </div>
                @endauth
                @guest
                    <div class="header-wishlist-item-txt p-t-8">
                        <h3>
                            Only Authorized Users Can Access wishlist
                        </h3>

                        <br>

                        <span class="header-wishlist-item-info">
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
