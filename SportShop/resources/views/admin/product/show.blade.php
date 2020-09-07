@extends('admin.product.menu')

@section('product_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5 show-product-information">
                            <b>Product Name:</b> {{ $data["product"]->getName() }}<br/>
                            <b>Product Description:</b> {{ $data["product"]->getDescription() }}<br/> 
                            <b>Product Quantity:</b> {{ $data["product"]->getQuantity() }}<br/> 
                            <b>Product Price:</b> {{ $data["product"]->getPrice() }}<br/> 
                            <b>Product Size:</b> {{ $data["product"]->getSize() }}<br/>
                        </div>
                        <div class="col-sm-4 show-product-information">
                            <img src="/img/{{ $data['product']->getImage() }}" class="show-image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 update-btn">
                            <a class="btn btn-outline-success btn-block" href="{{ route('admin.product.update_form',['id'=> $data['product']->getId()]) }}">Update</a>
                        </div>
                        <div class="col-sm-5 delete-btn">
                            <a class="btn btn-outline-danger btn-block" href="{{ route('admin.product.delete',['id'=> $data['product']->getId()]) }}" onclick="return confirm('Are you sure to delete this product?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection