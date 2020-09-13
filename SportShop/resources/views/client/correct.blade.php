@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('util.message')
                </div>
                <div class="card-body">
                    <div class="form-row">
                    <div class="form-group col-md-12">
                        <a class="navbar-brand btn btn-outline-success btn-block" href="{{ route('client.confirm') }}"><img src="/icons/cart-check.svg" class="delete-icon"></a>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
