@extends('admin.sale.dateForm')

@section('result')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Sales List 
                </div>
                <div class="card-body">
                    <main class="py-4">
                        @yield('result')
                    </main>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sale Id</th>
                                <th>Sale Date</th>
                                <th>Total To Pay</th>
                                <th>User Id</th>
                                <th>Show Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["sales"] as $sale)
                                <tr>
                                    <th>{{ $sale->getId() }}</th>
                                    <th>{{ $sale->getDate() }}</th>
                                    <th>{{ $sale->getTotal_to_pay() }}</th>
                                    <th>{{ $sale->getUserId() }}</th>
                                    <th><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('admin.sale.show',['id'=> $sale->getId()]) }}"><img src="/icons/file-earmark-text.svg" class="delete-icon"></a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection