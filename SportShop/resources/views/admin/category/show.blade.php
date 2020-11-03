@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["category"]->getName() }} {{ __('category.detail') }}</div>

                <div class="card-body">
                    <b>{{ __('category.label.categoryName') }}</b> {{ $data["category"]->getName() }}<br />
                    <b>{{ __('category.label.description') }}</b> {{ $data["category"]->getDescription() }}<br />
                    <br>
                    <br>
                    <div class="option-button">
                        <div class = "row">
                            <div class="col-sm-5 update-btn">
                                <a class="btn btn-outline-success btn-block" href="{{ route('admin.category.update_form',['id'=> $data['category']->getId()]) }}">{{ __('category.holder.update') }}</a>
                            </div>
                            <div class="col-sm-5 update-btn">
                                <a class="btn btn-outline-danger btn-block" href="{{ route('admin.category.delete',['id'=> $data['category']->getId()]) }}" onclick="return confirm('Are you sure to delete this category?')">{{ __('category.holder.delete') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
