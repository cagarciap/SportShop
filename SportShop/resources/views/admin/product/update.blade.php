@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Product.info') }}
                    <a class="btn btn-outline-info return-btn" href="{{ route('admin.product.show',['id' => $data['product']->getId()]) }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                </div>
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
                                <label>{{ __('Product.input.name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ $data['product']->getName() }}" name="name" value="{{ $data['product']->getName() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Product.input.description') }}</label>
                                <input type="text" class="form-control" placeholder="{{ $data['product']->getDescription() }}" name="description" value="{{ $data['product']->getDescription() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Product.input.quantity') }}</label>
                                <input type="number" class="form-control" placeholder="{{ $data['product']->getQuantity() }}" name="quantity" value="{{ $data['product']->getQuantity() }}" min="0" max="2147483647"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Product.input.price') }}</label>
                                <input type="text" class="form-control" placeholder="{{ $data['product']->getPrice() }}" name="price" value="{{ $data['product']->getPrice() }}" min="0" max="999999.9999"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Product.input.size') }}</label>
                                <input type="text" class="form-control" placeholder="{{ $data['product']->getSize() }}" name="size" value="{{ $data['product']->getSize() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Product.input.category') }}</label>
                                <select class="form-control" name="category">
                                    @foreach($data["categories"] as $category)
                                        <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div align="center">
                                <label>{{ __('Product.input.image') }}</label></br>
                                <img src="{{ asset('/img/'.$data['product']->getImage()) }}" class="list-picture">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>{{ __('Product.input.newImage') }}</label></br>
                                <input type="file" name="image" id="image_file" value="{{ old('image') }}" />
                            </div>
                            <div class="form-group col-md-12">
                                <input type="hidden" id="image_file_name" class="form-control" placeholder="{{ $data['product']->getImage() }}" name="image_name" value="{{ $data['product']->getImage() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-outline-success btn-block">{{ __('Product.update') }}</button>
                            </div>
                            <div class="form-group col-md-6">
                                <a class="btn btn-outline-danger btn-block" href="{{ route('admin.product.delete',['id'=> $data['product']->getId()]) }}" onclick="return confirm('Are you sure to delete this product?')">{{ __('Product.delete') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection