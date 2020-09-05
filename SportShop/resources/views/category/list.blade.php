@extends('layouts.master')
@section("title", "Categories")
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Show Description</th>
                  <th>Unique</th>
               </tr>
            </thead>
            <tbody>
               @foreach($data["first_categories"] as $category)
               <tr>
                  <td class="table-bold">{{ $category->getId() }}</td>
                  <td>{{ $category->getName() }}</td>
                  <td>{{ $category->getDescription() }}</td>
                  <td><a class="navbar-brand" href="{{ route('category.show',['id'=> $category->getId()])}}">Show Details</a></td>
                  <td><a class="navbar-brand" href="{{ route('category.delete',['id'=> $category->getId()])}}">Delete</a></td>
               </tr>
               @endforeach

               @foreach($data["second_categories"] as $category)
               <tr>
                  <td> {{ $category->getId() }} </td>
                  <td>{{ $category->getName() }}</td>
                  <td>{{ $category->getDescription() }}</td>
                  <td><a class="navbar-brand" href="{{ route('category.show',['id'=> $category->getId()])}}">Show Details</a></td>
                  <td><a class="navbar-brand" href="{{ route('category.delete',['id'=> $category->getId()])}}">Delete</a></td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection