@extends('user.user-layout')
@section('title')
    {{ 'Home Page' }}
@endsection
@section('desc')
    {{ "This is the home page of our website"  }}
@endsection
@section('keyword')
    {{ "home, about us , contact us, ecommerce , sun glasses , t-shirts"}}
@endsection
@section('body')

    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach ($sliders as $slider)
                    <div class="item-slick1"
                        style="background-image: url({{ asset('storage/' . $slider->image) }});height:750px">
                        <div class="container h-full">
                            <div class="h-full flex-col-l-m p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                    <span class="ltext-101 cl2 respon2">
                                        {{ $slider->description }}
                                    </span>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{ $slider->title }}
                                    </h2>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{ route('user.shop') }}"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Feature-->
    <div class="mt-5 text-center p-b-10">
        <h3 class="ltext-103 cl5">
            Features
        </h3><br>
    </div>
    <section id="feature" class="m-5 section-p1">
        <div class="fe-1">
            <img src="{{ asset('storage/Features/f1.png') }}" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-1">
            <img src="{{ asset('storage/Features/f2.png') }}" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-1">
            <img src="{{ asset('storage/Features/f3.png') }}" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-1">
            <img src="{{ asset('storage/Features/f4.png') }}" alt="">
            <h6>Promitions</h6>
        </div>
        <div class="fe-1">
            <img src="{{ asset('storage/Features/f5.png') }}" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-1">
            <img src="{{ asset('storage/Features/f6.png') }}" alt="">
            <h6>F7/24 Support</h6>
        </div>
    </section>
    <!-- categories -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="text-center p-b-10">
                <h3 class="ltext-103 cl5">
                    Categories
                </h3><br>
            </div>
            <div class="row flex-w flex-c-m">
                @foreach ($categories as $category)
                    <a href="{{ route('user.categoryProduct', $category->slug) }}">
                        <div class="mr-5 card" style="width: 200px;height:200px">
                            <img src="{{ asset("storage/$category->image") }}" style="height:130px" class="card-img-top"
                                alt="...">
                    </a>
                    <div class="card-body">
                        <h4 class="text-center ">{{ $category->name }}</h4>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
    <br><br>
    <!-- deals -->
    <div class="mt-5 text-center p-b-10">
        <h3 class="ltext-103 cl5">
            <div class=""><span class="text-danger">Hot</span> Deals</div>
        </h3><br>
    </div>
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach ($deals as $deal)
                    <div class="item-slick1"
                        style="background-image: url({{ asset('storage/' . $deal->image) }});height:300px">
                        <div class="container h-full">
                            <div class="h-full flex-col-l-m p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown">
                                    <span class="ltext-101 cl2 respon2">
                                        {{ $deal->description }}
                                    </span>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{ $deal->title }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><br><br><br>
    <!-- new arrivals -->
    <livewire:user.product.arrivals/>
@endsection
