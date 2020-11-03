@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('Product.menu.create') }}</div>
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
                                    <label>{{ __('Product.input.name') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Product.messInput.nameInput') }}" name="name" value="{{ old('name') }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('Product.input.description') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Product.messInput.descriptionInput') }}" name="description" value="{{ old('descripcion') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('Product.input.quantity') }}</label>
                                    <input type="number" class="form-control" placeholder="{{ __('Product.messInput.quantityInput') }}" name="quantity" value="{{ old('quantity') }}" min="0" max="2147483647"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('Product.input.price') }}</label>
                                    <input type="number" class="form-control" placeholder="{{ __('Product.messInput.priceInput') }}" name="price" value="{{ old('price') }}" min="0" max="999999.9999" step="any"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('Product.input.size') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Product.messInput.sizeInput') }}" name="size" value="{{ old('size') }}" />
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
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>{{ __('Product.input.image') }}</label></br>
                                    <input type="file" name="image" value="{{ old('image') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-success btn-block">{{ __('Product.addProduct') }}</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

