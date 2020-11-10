@extends('user.routine.menu')

@section('routine_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	{{ __('routine.detail') }}
                </div>
                <div class="card-body">
                	<b>{{ __('routine.info.name') }}</b> {{ $data["routine"]->getName() }}<br />
                    <b>{{ __('routine.info.description') }}</b> {{ $data["routine"]->getDescription() }}<br />
                    <b>{{ __('routine.info.minimumBMI') }}</b> {{ $data["routine"]->getMinMasa() }}<br />
                    <b>{{ __('routine.info.maximumBMI') }}</b> {{ $data["routine"]->getMaxMasa() }}<br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
