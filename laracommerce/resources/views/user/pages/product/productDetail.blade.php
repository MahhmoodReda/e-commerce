@extends('user.user-layout')

@section('title')
    {{ $product->meta_title }}
@endsection

@section('desc')
    {{ "This is $product->description  Category"  }}
@endsection

@section('keyword')
    {{ "home, about us , contact us, ecommerce , sun glasses , t-shirts"}}
@endsection

@section('body')
<br><br>
    <livewire:user.product.product-details :product="$product" />
@endsection