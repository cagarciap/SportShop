@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @include('util.message')
            <div class="card">
                <div class="card-header">Create routine</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('admin.routine.save') }}">
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Routine Name</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Routine Description</label>
                                <input type="text" class="form-control" placeholder="Enter description" name="description" value="{{ old('descripcion') }}" />
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Minimum BMI</label>
                                <input type="number" class="form-control" placeholder="Enter minMasa" name="minMasa" value="{{ old('minMasa') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Maximum BMI</label>
                                <input type="number" class="form-control" placeholder="Enter maxMasa" name="maxMasa" value="{{ old('maxMasa') }}" />
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-outline-success btn-block">Add Routine</button>
                            </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
