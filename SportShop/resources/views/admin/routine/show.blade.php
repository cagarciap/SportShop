@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('routine.detail') }}
                    <a class="btn btn-outline-info return-btn" href="{{ route('admin.routine.list') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                </div>
                <div class="card-body"> 
                    <b>{{ __('routine.info.name') }}</b> {{ $data["routine"]->getName() }}<br />
                    <b>{{ __('routine.info.description') }}</b> {{ $data["routine"]->getDescription() }}<br />
                    <b>{{ __('routine.info.minimumBMI') }}</b> {{ $data["routine"]->getMinMasa() }}<br />
                    <b>{{ __('routine.info.maximumBMI') }}</b> {{ $data["routine"]->getMaxMasa() }}<br />
                    <br>
                    <div class="row">
                        <div class="col-sm-5 update-btn">
                            <a class="btn btn-outline-success btn-block" href="{{ route('admin.routine.update_form',['id'=> $data['routine']->getId()]) }}">{{ __('routine.holder.update') }}</a>
                        </div>
                        <div class="col-sm-5 delete-btn">
                        	<a class="btn btn-outline-danger btn-block" href="{{ route('admin.routine.delete',['id'=> $data['routine']->getId()]) }}" onclick="return confirm('{{ __('routine.holder.confirm') }}')">{{ __('routine.holder.delete') }}</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
