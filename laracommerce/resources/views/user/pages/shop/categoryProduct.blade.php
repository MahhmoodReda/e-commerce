@extends('user.user-layout')

@section('title')
    {{ $category->meta_title }}
@endsection

@section('desc')
    {{ $category->meta_description }}
@endsection

@section('keyword')
    {{ $category->meta_keyword }}
@endsection

@section('body')
    <!-- Product -->
    <br><br><br><br>
    <section class="text-center bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    {{ $category->name }}
                </h3>
            </div>
            <br><br>
            <livewire:user.product.view-product-category  :category="$category"  />
        </div>

    </section>
@endsection
