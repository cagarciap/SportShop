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
               <tr>
                  <td>{{ $data["routines"]->getId() }}</td>
                  <td>{{ $data["routines"]->getName() }}</td>
                  <td>{{ $data["routines"]->getDescription() }}</td>
                  <td><a class="navbar-brand" href="{{ route('user.routine.show',['id'=> $data['routines']->getId()])}}"><img src="/icons/eye.svg" </a></td>                 
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
