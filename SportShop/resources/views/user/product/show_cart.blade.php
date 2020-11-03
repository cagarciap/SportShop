@extends('layouts.master')

@section('content')
<div class="container">
    @if ($data["products"] == null)
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ __('Product.show_cart.empty') }}
                        <a class="btn btn-outline-danger return-btn" href="{{ route('client.delete.cart') }}"><img src="{{ asset('/icons/cart-x.svg') }}" class="delete-icon"></a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('client.list') }}" class="btn btn-outline-success btn-block">{{ __('Product.title_list') }}</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Product.show_cart.shopping') }}
                        <a class="btn btn-outline-info return-btn" href="{{ route('client.list') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Product.show_cart.product') }}</th>
                                    <th>{{ __('Product.show_cart.price') }}</th>
                                    <th>{{ __('Product.show_cart.quantity') }}</th>
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
                                <a class="navbar-brand btn btn-outline-success btn-block" data-toggle="modal" data-target="#confirm"><img src="{{ asset('/icons/cart-check.svg') }}" class="delete-icon"></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endif
</div>
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title">{{ __('Product.show_cart.confirm') }}</h5>
                <h5 class="modal-title" id="total_to_pay"></h5></br>
                @if (Auth::user()->getCredit() >= 20)
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <a class="navbar-brand btn btn-outline-warning btn-block" href="{{ route('client.confirm',['credits'=>'True']) }}">{{ __('Product.show_cart.useCredits') }}</a>
                        </div>
                        <div class="form-group col-md-6">
                            <a class="navbar-brand btn btn-outline-success btn-block" href="{{ route('client.confirm',['credits'=>'False']) }}">{{ __('Product.show_cart.saveCredits') }}</a>
                        </div>
                    </div>
                @else
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <a class="navbar-brand btn btn-outline-success btn-block" href="{{ route('client.confirm',['credits'=>'False']) }}">{{ __('Product.show_cart.confirmButton') }}</a>
                        </div>
                    </div> 
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Product.show_cart.close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

