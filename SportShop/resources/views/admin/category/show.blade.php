@extends('admin.category.menu')

@section('category_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["category"]->getName() }} Detail</div>

                <div class="card-body"> 
                    <b>Category:</b> {{ $data["category"]->getName() }}<br />
                    <b>Description:</b> {{ $data["category"]->getDescription() }}<br />
                    <div class="option-button">
                        <a class="btn btn-outline-danger btn-block" href="{{ route('admin.category.delete',['id'=> $data['category']->getId()]) }}" onclick="return confirm('Are you sure to delete this category?')">Delete Product</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection