@extends('admin.menu')

@section('menu_content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
        @if ($data["categories"]->isEmpty())
            <div class="text">
                <div class="form-group col-md-12">
                    (Don't have categories) <br> <br>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-outline-success btn-block">Create one category</a>
                </div>
            </div>
        @else
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
               @foreach($data["categories"] as $category)
               <tr>
                  <td>{{ $category->getId() }}</td>
                  <td>{{ $category->getName() }}</td>
                  <td>{{ $category->getDescription() }}</td>
                  <td><a class="navbar-brand" href="{{ route('admin.category.show',['id'=> $category->getId()])}}"><img src="/icons/eye.svg" class="delete-icon"></a></td>
                  <td><a class="navbar-brand" href="{{ route('admin.category.delete',['id'=> $category->getId()])}}" onclick="return confirm('Are you sure to delete this category?')"><img src="/icons/trash.svg" class="delete-icon"></a></td>
               </tr>
               @endforeach
            </tbody>
         </table>
        @endif
      </div>
   </div>
</div>
@endsection
