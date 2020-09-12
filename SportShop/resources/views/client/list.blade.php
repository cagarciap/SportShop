@extends('layouts.master')

@section('content')
<div class="container">
    @include('util.message')
    <div class="row justify-content-center">
        @foreach($data["products"] as $product)
            <div class="col-md-auto container-product"></div">
                <div class="row justify-content-center img-container">
                    <div class="col-12" align="center">
                        <img src="/img/{{ $product->getImage() }}" class="list-picture">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 product-information"><b>{{ $product->getName() }}</b> </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-4 product-information">
                        <b>{{ $product->getPrice() }}$</b>
                    </div>
                    <div class="col-4 product-information">
                        <a class="navbar-brand btn btn-outline-success btn-block" style="margin: 5%" href="{{ route('client.add_cart',['id'=> $product->getId()]) }}"><img src="/icons/cart-plus.svg" class="delete-icon"></a>
                    </div>
                    <div class="col-4 product-information">
                        <a class="navbar-brand btn btn-outline-success btn-block" style="margin: 5%" href="{{ route('client.show',['id'=> $product->getId(),'status'=>True]) }}"><img src="/icons/eye.svg" class="delete-icon"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('client.show_cart') }}">Ver carrito</a>
</div>
@endsection
