@extends('layouts.master')

@section('content')
<div class="container">
    @if ($data["sales"]->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Don't have any purchases</div>
                </div>
            </div>
        </div>
    @else

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Total</th>
                                <th>Id_User</th>
                                <th colspan="2">{{ __('category.table.option') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["sales"] as $sales)
                            <tr>
                                <th>{{ $sales->getId() }}</th>
                                <th>{{ $sales->getTotal_to_pay() }}</th>
                                <th>{{ $sales->getUserId() }}</th>
                                <th><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('user.sale.show',['id'=> $sales->getId()]) }}"><img src="{{ asset('/icons/file-earmark-text.svg') }}" class="delete-icon"></a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    @endif
</div>
@endsection
