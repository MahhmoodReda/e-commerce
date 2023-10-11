@extends('user.user-layout')

@section('title')
{{ "thank you" }}
@endsection

@section('desc')
{{ "This is thank you page"  }}
@endsection

@section('keyword')
{{ "home, about us , contact us, ecommerce , sun glasses , t-shirts"}}
@endsection

@section('body')
<br><br><br><br><br><br>
<div class="m-5 text-center shadow card card-body">
    <h4>
        thank you for shopping from our website
    </h4>
    <br>
    <div class="items-center">

        <a href="{{ route('user.shop') }}" class="float-center btn btn-primary " style="width: 120px">shop now</a>
    </div>
</div>
<br><br><br>
<br><br><br>
@endsection