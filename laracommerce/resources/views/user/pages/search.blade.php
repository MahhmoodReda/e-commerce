@extends('user.user-layout')

@section('title')
{{ "search products" }}
@endsection

@section('desc')
{{ "This is search products page"  }}
@endsection

@section('keyword')
{{ "home, about us , contact us, ecommerce , sun glasses , t-shirts"}}
@endsection

@section('body')

<div>
    <!-- Product -->
    <br><br><br><br>
    <section class="text-center bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                   Search Results
                </h3>
            </div>

            <br><br>
            <div class="row">
                @forelse ($search as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('storage/' . $product->ProductImage[0]->image) }}"
                                style="height:300px;width:200px" alt="">
                            <a href="{{ route('user.productDetails',$product->id) }}"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                Quick View
                            </a>
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <span class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product->name }}
                                </span>
                                <span class="stext-105 cl3">
                                    ${{ $product->selling_price }}
                                </span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <button type="button" wire:click='addToWish({{ $product->id }})'
                                    class="btn-addwish-b2 dis-block pos-relative  @auth{{  " js-addwish-b2" }}@endauth">
                                    <i class="zmdi zmdi-favorite-outline"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <tr colspan='7'>
                    <h3>No data found</h3>
                    </td>
                </tr>
                @endforelse
            </div>
        </div>
    </section>
</div>


@endsection