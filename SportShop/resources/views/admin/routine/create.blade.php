@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('routine.createRoutine') }}</div>
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
                                <label>{{ __('routine.label.routineName') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('routine.holder.name') }}" name="name" value="{{ old('name') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.description') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('routine.holder.description') }}" name="description" value="{{ old('descripcion') }}" />
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.minimumBMI') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('routine.holder.minimumBMI') }}" name="minMasa" value="{{ old('minMasa') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.maximumBMI') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('routine.holder.maximumBMI') }}" name="maxMasa" value="{{ old('maxMasa') }}" />
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-outline-success btn-block">{{ __('routine.label.add') }}</button>
                            </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
