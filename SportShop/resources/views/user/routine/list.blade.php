@extends('user.routine.menu')

@section('routine_content')
<div class="container">
    @if ($data["routines"]->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('routine.noRoutines') }}</div>
                    <div class="card-body">
                        <a href="{{ route('client.list') }}" class="btn btn-outline-success btn-block">{{ __('routine.title.list') }}</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>{{ __('routine.table.id') }}</th>
                          <th>{{ __('routine.table.name') }}</th>
                          <th>{{ __('routine.table.show') }}</th>
                          <th colspan="2">{{ __('routine.table.option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["routines"] as $routine)
                        <tr>
                            <td>{{ $routine->getId() }}</td>
                            <td>{{ $routine->getName() }}</td>
                            <td>{{ $routine->getDescription() }}</td>
                            <td><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('user.routine.show',['id'=> $routine->getId()])}}"><img src="{{ asset('/icons/file-earmark-text.svg') }}"></a></td>                  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
