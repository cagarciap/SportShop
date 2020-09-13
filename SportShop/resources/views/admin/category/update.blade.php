@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category Information</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.category.update') }}" enctype="multipart/form-data" class="form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['category']->getId() }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Category Name</label>
                                <input type="text" class="form-control" placeholder="{{ $data['category']->getName() }}" name="name" value="{{ $data['category']->getName() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Category Description</label>
                                <input type="text" class="form-control" placeholder="{{ $data['category']->getDescription() }}" name="description" value="{{ $data['category']->getDescription() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-outline-success btn-block">Update Category</button>
                            </div>
                            <div class="form-group col-md-6">
                                <a class="btn btn-outline-danger btn-block" href="{{ route('admin.category.delete',['id'=> $data['category']->getId()]) }}" onclick="return confirm('Are you sure to delete this category?')">Delete Category</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
