@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Product Information
                    @if (Auth::user() != null)
                        <a class="btn btn-outline-info return-btn" href="{{ url()->previous() }}"><img src="/icons/arrow-return-left.svg" class="delete-icon"></a>
                    @else
                        <a class="btn btn-outline-info return-btn" href="{{ route('client.list') }}"><img src="/icons/arrow-return-left.svg" class="delete-icon"></a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5 show-product-information">
                            <b>Product Name:</b> {{ $data["product"]->getName() }}<br/>
                            <b>Product Description:</b> {{ $data["product"]->getDescription() }}<br/> 
                            <b>Product Quantity:</b> {{ $data["product"]->getQuantity() }}<br/> 
                            <b>Product Price:</b> {{ $data["product"]->getPrice() }}<br/> 
                            <b>Product Size:</b> {{ $data["product"]->getSize() }}<br/>
                            <b>Product Category:</b> {{ $data["product"]->category->getName() }}<br/>
                        </div>
                        <div class="col-sm-4 show-product-information">
                            <img src="/img/{{ $data['product']->getImage() }}" class="show-image">
                        </div>
                    </div>
                    @if (Auth::user() != null)
                    <div class="row">
                        <div class="form-group col-md-12">
                            <a class="btn btn-outline-success btn-block" href="{{ route('client.add_cart',['id'=> $data['product']->getId()]) }}"><img src="/icons/cart-plus.svg" class="delete-icon"></a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection