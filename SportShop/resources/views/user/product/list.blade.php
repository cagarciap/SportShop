@extends('layouts.master')

@section('content')
<div class="container">
    @include('util.message')
    @if(Auth::user() != null)
        <a href="{{ route('client.show_cart') }}" class="btn btn-outline-success cart-btn">Ver carrito</a><br><br>
    @endif
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="{{ route('client.filter.product') }}" class="form">
            @csrf
            <div class="form-row category-filter">
                <div class="form-group col-md-6">
                    <select class="form-control" name="category">
                            <option value="all">All</option>
                        @foreach($data["categories"] as $category)
                            <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-outline-success btn-block">Filter Products</button>
                </div>
            </div>
        </form>
    </div>
</div>
    <div class="row justify-content-center">
        @foreach($data["products"] as $product)
            <div class="col-md-auto container-product"></div">
                <div class="row justify-content-center img-container">
                    <div class="col-12" align="center">
                        <img src="{{ asset('/img/'.$product->getImage()) }}" class="list-picture">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 product-information"><b>{{ $product->getName() }}</b> </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-4 product-information-2">
                        <b>{{ $product->getPrice() }}$</b>
                    </div>
                    @if (Auth::user() != null)
                        <div class="col-4 product-information-2">
                            <a class="navbar-brand btn btn-outline-success btn-block" href="{{ route('client.add_cart',['id'=> $product->getId()]) }}"><img src="{{ asset('/icons/cart-plus.svg') }}" class="delete-icon"></a>
                        </div>
                    @endif
                    <div class="col-4 product-information-2">
                        <a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('client.show',['id'=> $product->getId()]) }}"><img src="{{ asset('/icons/file-earmark-text.svg') }}" class="delete-icon"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>
@endsection
