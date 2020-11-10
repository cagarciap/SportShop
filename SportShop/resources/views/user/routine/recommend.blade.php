@extends('user.routine.menu')

@section('routine_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('routine.holder.recommend') }}</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('user.routine.calculate') }}">
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.weight') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('routine.holder.weight') }}" name="weight" value="{{ old('weight') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.height') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('routine.holder.height') }}" name="height" value="{{ old('height') }}" />
                            </div>
                        </div>
                    <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-outline-success btn-block">{{ __('routine.holder.calculate') }}</button>
                            </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
