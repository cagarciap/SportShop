@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('util.message')
            @if (!Auth::guest())
                @if (Auth::user()->getRole() == 'admin')
                    <div class="card">
                        <div class="card-header">Create product</div>
                        <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                            <form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data" class="form">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Product Description</label>
                                        <input type="text" class="form-control" placeholder="Enter description" name="description" value="{{ old('descripcion') }}" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Product Quantity</label>
                                        <input type="number" class="form-control" placeholder="Enter quantity" name="quantity" value="{{ old('quantity') }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Product Price</label>
                                        <input type="text" class="form-control" placeholder="Enter price" name="price" value="{{ old('price') }}" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Product Size</label>
                                        <input type="text" class="form-control" placeholder="Enter size" name="size" value="{{ old('size') }}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Product Category</label>
                                        <select class="form-control" name="category">
                                            @foreach($data["categories"] as $category)
                                                <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Product Image</label></br>
                                        <input type="file" name="image" value="{{ old('image') }}" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-outline-success btn-block">Add Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection

