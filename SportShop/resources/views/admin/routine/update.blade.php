@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('routine.label.info') }} </div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.routine.update') }}" enctype="multipart/form-data" 	class="form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data['routine']->getId() }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.routineName') }}</label>
                                <input type="text" class="form-control" placeholder="{{ $data['routine']->getName() }}" name="name" value="{{ $data['routine']->getName() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.description') }}</label>
                                <input type="text" class="form-control" placeholder="{{ $data['routine']->getDescription() }}" name="description" value="{{ $data['routine']->getDescription() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.minimumBMI') }}</label>
                                <input type="number" class="form-control" placeholder="{{ $data['routine']->getMinMasa() }}" name="minMasa" value="{{ $data['routine']->getMinMasa() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('routine.label.maximumBMI') }}</label>
                                <input type="number" class="form-control" placeholder="{{ $data['routine']->getMaxMasa() }}" name="maxMasa" value="{{ $data['routine']->getMaxMasa() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-outline-success btn-block">{{ __('routine.holder.update') }}</button>
                            </div>
                            <div class="form-group col-md-6">
                                <a class="btn btn-outline-danger btn-block" href="{{ route('admin.routine.delete',['id'=> $data['routine']->getId()]) }}" onclick="return confirm('{{ __('routine.holder.confirm') }}')">{{ __('routine.holder.delete') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection