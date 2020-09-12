@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Shopping Cart 
                    <a class="btn btn-outline-primary return-btn" href="{{ route('client.list') }}"><img src="/icons/arrow-return-left.svg" class="delete-icon"></a>
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
                                    <th style="width: 20%">
                                        <form action="{{ route('client.quantity',['id'=> $product->getId()]) }}" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" name="quantity" min="0" value="{{ $product->getQuantity() }}" style="width: 80px;">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button type="submit" class="btn btn-outline-success"><img src="/icons/plus-circle.svg"></button>
                                                </div>
                                            </div>
                                        </form>
                                    </th>
                                    <th><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('client.show',['id'=> $product->getId()]) }}"><img src="/icons/file-earmark-text.svg" class="delete-icon"></a></th>
                                    <th><a class="navbar-brand btn btn-outline-danger btn-block" href="{{ route('client.delete',['id'=> $product->getId()]) }}"><img src="/icons/cart-x.svg" class="delete-icon"></a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <a class="navbar-brand btn btn-outline-success btn-block" href="{{ route('client.confirm') }}"><img src="/icons/cart-check.svg" class="delete-icon"></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
