@extends('admin.category.menu')

@section('category_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create Category</div>
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
                    <input type="text" placeholder="Enter Name" name="name" value="{{ old('name') }}" />
                    <input type="text" placeholder="Enter Description" name="description" value="{{ old('description') }}" />
                    <input type="submit" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
