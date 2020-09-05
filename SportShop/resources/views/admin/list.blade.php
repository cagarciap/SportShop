@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    @include('util.message')
    <div class="row justify-content-center">
        @foreach($data["products"] as $product)
            <div class="col container-product"></div">
                <div class="row justify-content-center">
                    <div class="col-10" align="center">
                        <img src="/img/{{ $product->getImage() }}" class="list-picture">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-8 product-information"><b>{{ $product->getName() }}</b> </div>
                    <div class="col-4 product-information"><a class="navbar-brand" href="{{ route('product.show',['id'=> $product->getId()]) }}"><img src="/icons/eye.svg" class="show-icon"></a></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-8 product-information"><b>Price: </b> {{ $product->getPrice() }}$</div>
                    <!-- Div carrito de compras --> 
                    <div class="col-4 product-information"><a class="navbar-brand" href=""><img src="/icons/cart4.svg" class="delete-icon"></a></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection