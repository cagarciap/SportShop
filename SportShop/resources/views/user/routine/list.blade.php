@extends('user.routine.menu')

@section('routine_content')
<div class="container">
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
                  <td><a class="navbar-brand btn btn-outline-info btn-block" href="{{ route('user.routine.show',['id'=> $routine->getId()])}}"><img src="/icons/file-earmark-text.svg" </a></td>                  
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
