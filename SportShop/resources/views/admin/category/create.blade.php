@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('category.createCategory') }}</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('admin.category.save') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>{{ __('category.label.categoryName') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('category.holder.name') }}" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('category.label.description') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('category.holder.description') }}" name="description" value="{{ old('description') }}" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-outline-success btn-block">{{ __('category.label.add') }}</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
