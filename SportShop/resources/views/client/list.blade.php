@extends('layouts.master')

@section('content')
<div class="container">
    <a href="{{ route('client.show_cart') }}" class="btn btn-outline-success cart-btn">Ver carrito</a><br><br>
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
                    <div class="col-4 product-information-2">
                        <b>{{ $product->getPrice() }}$</b>
                    </div>
                    <div class="col-4 product-information-2">
                        <a class="navbar-brand btn btn-outline-success btn-block" href="{{ route('client.add_cart',['id'=> $product->getId()]) }}"><img src="/icons/cart-plus.svg" class="delete-icon"></a>
                    </div>
                    <div class="col-4 product-information-2">
                        <a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('client.show',['id'=> $product->getId(),'status'=>True]) }}"><img src="/icons/file-earmark-text.svg" class="delete-icon"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>
@endsection
