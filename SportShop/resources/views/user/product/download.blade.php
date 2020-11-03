@extends('layouts.master')

@section('content')

@include('util.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form method="POST" action="{{ route('download.bill') }}" class="form">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>{{ __('Sale.downloadBill') }}</label>
                            <select class="form-control" name="billWay" required>
                                <option value="pdf" selected>PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-outline-success btn-block">{{ __('Sale.downloadBill') }}</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <a class="navbar-brand btn btn-outline-primary btn-block" href="{{ route('client.list') }}">{{ __('Sale.return') }}</a>
                        </div>
                    </div> 
            </form>
        </div>
    </div>
</div>
@endsection
