@extends('user.user-layout')

@section('title')
    {{ "All Products" }}
@endsection

@section('desc')
    {{ "This is products page"  }}
@endsection

@section('keyword')
    {{ "home, about us , contact us, ecommerce , sun glasses , t-shirts"}}
@endsection

@section('body')

<livewire:user.shop.shop/>

@endsection