@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Information</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.product.update') }}" enctype="multipart/form-data" class="form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['product']->getId() }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Product Name</label>
                                <input type="text" class="form-control" placeholder="{{ $data['product']->getName() }}" name="name" value="{{ $data['product']->getName() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Product Description</label>
                                <input type="text" class="form-control" placeholder="{{ $data['product']->getDescription() }}" name="description" value="{{ $data['product']->getDescription() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Product Quantity</label>
                                <input type="number" class="form-control" placeholder="{{ $data['product']->getQuantity() }}" name="quantity" value="{{ $data['product']->getQuantity() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Product Price</label>
                                <input type="text" class="form-control" placeholder="{{ $data['product']->getPrice() }}" name="price" value="{{ $data['product']->getPrice() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Product Size</label>
                                <input type="text" class="form-control" placeholder="{{ $data['product']->getSize() }}" name="size" value="{{ $data['product']->getSize() }}" />
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
                        <div class="form-row justify-content-center">
                            <div align="center">
                                <label>Preview Image</label></br>
                                <img src="/img/{{ $data['product']->getImage() }}" class="list-picture">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>New Product Image</label></br>
                                <input type="file" name="image" id="image_file" value="{{ old('image') }}" />
                            </div>
                            <div class="form-group col-md-12">
                                <input type="hidden" id="image_file_name" class="form-control" placeholder="{{ $data['product']->getImage() }}" name="image_name" value="{{ $data['product']->getImage() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-outline-success btn-block">Update Product</button>
                            </div>
                            <div class="form-group col-md-6">
                                <a class="btn btn-outline-danger btn-block" href="{{ route('admin.product.delete',['id'=> $data['product']->getId()]) }}" onclick="return confirm('Are you sure to delete this product?')">Delete Product</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection