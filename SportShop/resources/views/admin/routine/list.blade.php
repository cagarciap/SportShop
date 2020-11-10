@extends('admin.menu')

@section('menu_content')
<div class="container">
    @if ($data["routines"]->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('routine.noRoutines') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.routine.create') }}" class="btn btn-outline-success btn-block">{{ __('routine.title.create') }}</a>
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
                                <td><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('admin.routine.show',['id'=> $routine->getId()])}}"><img src="{{ asset('/icons/file-earmark-text.svg') }}" class="delete-icon"></a></td>
                                <td><a class="navbar-brand btn btn-outline-danger btn-block" href="{{ route('admin.routine.delete',['id'=> $routine->getId()])}}" onclick="return confirm('{{ __('routine.holder.confirm') }}')"><img src="{{ asset('/icons/trash.svg') }}" class="delete-icon"></a></td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
