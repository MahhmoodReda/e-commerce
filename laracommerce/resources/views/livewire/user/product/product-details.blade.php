<div>
    <!-- breadcrumb -->

    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="{{ route('user.categoryProduct',$product->category->slug) }}" class="stext-109 cl8 hov-cl1 trans-04">
                {{ $product->category->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{ $product->name }}
            </span>
        </div>
    </div>
    <section class="sec-product-detail bg0 p-t-65 p-b-60">

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <div class="text-center">
                    <h1>Product Overview</h1>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>


                                <div class="gallery">
                                    @foreach ($product->ProductImage as $image)
                                        <input type="radio" checked="checked" name="select"
                                            id="{{ 'img-tab-' . $image->id }}">
                                        <label s for="{{ 'img-tab-' . $image->id }}"
                                            style="background-image: url({{ asset('storage/' . $image->image) }}); "></label>
                                        <img src="{{ asset("storage/$image->image") }}" border="0"
                                            style="width:400px;height:400px">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                Product Name : {{ $product->name }}
                            </h4>

                            <span class="mtext-106 cl2">
                                Price : ${{ $product->selling_price }}
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Small Description : {{ $product->small_description }}
                            </p>

                            <p class="stext-102 cl3 p-t-23">
                                Description : {{ $product->description }}

                            </p>

                            <!--  -->
                            <div class="p-t-33">


                                <!--  -->
                                <div class="p-t-33">

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-204 flex-w flex-m respon6-next">
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                                    wire:click='decrement'>
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    readonly wire:model='quantityCount' name="num-product"
                                                    value="{{ $quantityCount  }}">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                                    wire:click='increment'>
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>

                                            <button wire:click='addToCart({{ $product->id }})'
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 @auth
                                                js-addcart-detail
                                                @endauth">
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!--  -->
                                <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                    <div class="flex-m bor9 p-r-10 m-r-11">
                                        <a href="" wire:click.prevent='addToWish({{ $product->id }})'
                                            class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 @auth
                                            js-addwish-detail @endauth tooltip100"
                                            data-tooltip="Add to Wishlist">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Google Plus">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
                SKU: {{ $product->id }}-{{ $product->slug }}
            </span>

            <span class="stext-107 cl6 p-lr-25">
                Category: {{ $product->category->name }}
            </span>
        </div>
    </section>

</div>
