@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Product.info') }}
                    <a class="btn btn-outline-info return-btn" href="{{ route('admin.product.list') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5 show-product-information">
                            <b>{{ __('Product.input.name') }}</b> {{ $data["product"]->getName() }}<br/>
                            <b>{{ __('Product.input.description') }}</b> {{ $data["product"]->getDescription() }}<br/> 
                            <b>{{ __('Product.input.quantity') }}</b> {{ $data["product"]->getQuantity() }}<br/> 
                            <b>{{ __('Product.input.price') }}</b> {{ $data["product"]->getPrice() }}<br/> 
                            @if ($data["product"]->getSize() != null)
                                <b>{{ __('Product.input.size') }}</b> {{ $data["product"]->getSize() }}<br/>
                            @endif
                            <b>{{ __('Product.input.category') }}</b> {{ $data["product"]->category->getName() }}<br/>
                        </div>
                        <div class="col-sm-4 show-product-information">
                            <img src="{{ asset('/img/'.$data['product']->getImage()) }}" class="show-image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 update-btn">
                            <a class="btn btn-outline-success btn-block" href="{{ route('admin.product.update_form',['id'=> $data['product']->getId()]) }}">{{ __('Product.update') }}</a>
                        </div>
                        <div class="col-sm-5 delete-btn">
                            <a class="btn btn-outline-danger btn-block" href="{{ route('admin.product.delete',['id'=> $data['product']->getId()]) }}" onclick="return confirm('Are you sure to delete this product?')">{{ __('Product.delete') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection