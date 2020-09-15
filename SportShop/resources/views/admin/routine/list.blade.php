@extends('admin.menu')

@section('menu_content')
<div class="container">
    @if ($data["routines"]->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Don't have any Routines</div>
                    <div class="card-body">
                        <a href="{{ route('admin.routine.create') }}" class="btn btn-outline-success btn-block">Create Routine</a>
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
                          <th>Id</th>
                          <th>Name</th>
                          <th>Show Description</th>
                          <th colspan="2">Option</th>
                       </tr>
                    </thead>
                    <tbody>
                       @foreach($data["routines"] as $routine)
                            <tr>
                                <td>{{ $routine->getId() }}</td>
                                <td>{{ $routine->getName() }}</td>
                                <td>{{ $routine->getDescription() }}</td>
                                <td><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('admin.routine.show',['id'=> $routine->getId()])}}"><img src="{{ asset('/icons/file-earmark-text.svg') }}" class="delete-icon"></a></td>
                                <td><a class="navbar-brand btn btn-outline-danger btn-block" href="{{ route('admin.routine.delete',['id'=> $routine->getId()])}}" onclick="return confirm('Are you sure to delete this routine?')"><img src="{{ asset('/icons/trash.svg') }}" class="delete-icon"></a></td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection
