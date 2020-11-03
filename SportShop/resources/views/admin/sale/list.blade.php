@extends('admin.sale.dateForm')

@section('result')
<div class="container">
    @if ($data["sales"]->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Sale.empty') }}</div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('Sale.title') }}
                    </div>
                    <div class="card-body">
                        <main class="py-4">
                            @yield('result')
                        </main>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Sale.id') }}</th>
                                    <th>{{ __('Sale.date') }}</th>
                                    <th>{{ __('Sale.total') }}</th>
                                    <th>{{ __('Sale.user') }}</th>
                                    <th>{{ __('Sale.details') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data["sales"] as $sale)
                                    <tr>
                                        <th>{{ $sale->getId() }}</th>
                                        <th>{{ $sale->getDate() }}</th>
                                        <th>{{ $sale->getTotal_to_pay() }}</th>
                                        <th>{{ $sale->getUserId() }}</th>
                                        <th><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('admin.sale.show',['id'=> $sale->getId()]) }}"><img src="{{ asset('/icons/file-earmark-text.svg') }}" class="delete-icon"></a></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-row">
                            <div class="col-sm-5 update-btn">
                                <a class="btn btn-success" href="{{ route('admin.sale.export') }}">{{ __('Sale.download') }}</a>
                            </div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
