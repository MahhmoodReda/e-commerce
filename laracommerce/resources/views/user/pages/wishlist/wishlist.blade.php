@extends('user.user-layout')

@section('title')
    {{ "WishList" }}
@endsection

@section('desc')
    {{ "This is WishList page"  }}
@endsection

@section('keyword')
    {{ "home, about us , contact us, ecommerce , sun glasses , t-shirts"}}
@endsection

@section('body')
    <br><br><br>
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                WishList
            </span>
        </div>
    </div>
    <br><br><br>
    <livewire:user.wishlist.wishlist/>

@endsection