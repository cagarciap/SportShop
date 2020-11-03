@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Product.info') }}
                    @if (Auth::user() != null)
                        <a class="btn btn-outline-info return-btn" href="{{ url()->previous() }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                    @else
                        <a class="btn btn-outline-info return-btn" href="{{ route('client.list') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                    @endif
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
                    @if (Auth::user() != null)
                    <div class="row">
                        <div class="form-group col-md-12">
                            <a class="btn btn-outline-success btn-block" href="{{ route('client.add_cart',['id'=> $data['product']->getId()]) }}"><img src="{{ asset('/icons/cart-plus.svg') }}" class="delete-icon"></a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection