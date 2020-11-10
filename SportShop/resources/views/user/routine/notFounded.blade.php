@extends('user.routine.menu')

@section('routine_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('routine.info.error') }}</div>

                <div class="card-body">
                	<b>{{ __('routine.info.notFounded') }}<br />
                	<div class="option-button">
                        <a class="btn btn-outline-success btn-block" href="{{ route('user.routine.recommend') }}">{{ __('routine.holder.recommendAgain') }}</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection