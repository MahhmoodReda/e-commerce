<div>

    <div class="flex-w flex-c-m m-tb-10">
        <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
            <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
            <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
            Filter
        </div>

        <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
            <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
            <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
            Search
        </div>
    </div>

    <!-- Search product -->
    <div class="w-full dis-none panel-search p-t-10 p-b-15">
        <div class="bor8 dis-flex p-l-15">
            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>

            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">

        </div>

    </div>

    <!-- Filter -->
    <div class="w-full dis-none panel-filter p-t-10 ">
        <div class="w-full wrap-filter flex-w bg6 p-lr-40 p-t-27 p-lr-15-sm">
            <div class="filter-col1 p-r-15 p-b-27">
                <div class="mtext-102 cl2 p-b-15">
                    Brands
                </div>

                <ul>
                    @foreach ($brands as $brand)
                        <li class="p-b-6">
                            <div class="form-check">
                                <input class="form-check-input" wire:model.live='brandInputs' type="checkbox"
                                    value="{{ $brand->id }}" id="{{ $brand->name }}">
                                <label class="form-check-label" for="{{ $brand->name }}">
                                    {{ $brand->name }}
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="filter-col2 p-r-15 p-b-27">
                <div class="mtext-102 cl2 p-b-15">
                    Price
                </div>

                <ul>
                    <li class="p-b-6">
                        <div class="form-check">
                            <input class="form-check-input" name="pricesort" wire:model.live='priceInput' type="radio"
                                value="high-to-low" id="price">
                            <label class="form-check-label" for="price">
                                High to Low
                            </label>
                        </div>
                    </li>
                    <li class="p-b-6">
                        <div class="form-check">
                            <input class="form-check-input" name="pricesort" wire:model.live='priceInput' type="radio"
                                value="low-to-high" id="price1">
                            <label class="form-check-label" for="price1">
                                Low to High
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        @forelse ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{ asset('storage/' . $product->ProductImage[0]->image) }}"
                            style="height:300px;width:200px" alt="">
                        <a href="{{ route('user.productDetails', $product->id) }}"
                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                            Quick View
                        </a>
                    </div>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <span class="stext-104 cl4 trans-04 js-name-b2 p-b-6">
                                {{ $product->name }}
                            </span>
                            <span class="stext-105 cl3">
                                ${{ $product->selling_price }}
                            </span>
                        </div>
                        <div class="block2-txt-child2 flex-r p-t-3">
                                <button type="button" wire:click='addToWish({{ $product->id }})'
                                    class="btn-addwish-b2 dis-block pos-relative  @auth{{  "js-addwish-b2"  }}@endauth">
                                    <i class="zmdi zmdi-favorite-outline"></i>
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-2">
                <h3>
                    no products available for {{ $category->name }}
                </h3>
            </div>
        @endforelse
    </div>
</div>
