@extends('layouts.master')

@section('content')
<div class="container">
    @if ($data["products"] == null)
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        The shopping cart is empty
                        <a class="btn btn-outline-danger return-btn" href="{{ route('client.delete.cart') }}"><img src="{{ asset('/icons/cart-x.svg') }}" class="delete-icon"></a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('client.list') }}" class="btn btn-outline-success btn-block">List of products</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Shopping Cart 
                        <a class="btn btn-outline-info return-btn" href="{{ route('client.list') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th colspan="2">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data["products"] as $product)
                                    <tr>
                                        <th>{{ $product->getName() }}</th>
                                        <th>{{ $product->getPrice() }}</th>
                                        <th class="quantity-column">
                                            <form action="{{ route('client.quantity',['id'=> $product->getId()]) }}" method="POST">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <input type="number" class="form-control" name="quantity" min="0" value="{{ $product->getQuantity() }}" class="quantity-input">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <button type="submit" class="btn btn-outline-success add-btn"><b>+</b></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </th>
                                        <th><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('client.show',['id'=> $product->getId()]) }}"><img src="{{ asset('/icons/file-earmark-text.svg') }}" class="delete-icon"></a></th>
                                        <th><a class="navbar-brand btn btn-outline-danger btn-block" href="{{ route('client.delete',['id'=> $product->getId()]) }}"><img src="{{ asset('/icons/cart-x.svg') }}" class="delete-icon"></a></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-row">
                        <div class="form-group col-md-12">
                            <a class="navbar-brand btn btn-outline-success btn-block" href="{{ route('client.confirm') }}"><img src="{{ asset('/icons/cart-check.svg') }}" class="delete-icon"></a>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
