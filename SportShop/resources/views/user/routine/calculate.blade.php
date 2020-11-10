@extends('user.routine.menu')

@section('routine_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('routine.info.calculated') }}
                    <a class="btn btn-outline-info return-btn" href="{{ route('user.routine.recommend') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                </div>
                <div class="card-body"> 
                    <b>{{ __('routine.info.bodyMI') }}</b> {{ $data['bodyMI'] }}<br />
                    <b>{{ __('routine.info.bodyState') }}</b> {{ $data['stateBody'] }}<br />
                    <table class="table table-striped">
            		  <thead>
                    	<tr>
                  			<th>{{ __('routine.info.recommend') }}</th>
                  			<th>{{ __('routine.table.show') }}</th>
               			</tr>
               		  </thead>
               		  <tbody>
                    	<tr>
                  			<td>{{ $data['bmiRoutine']->getName() }}</td>
                  			<td><a class="navbar-brand" href="{{ route('user.routine.show',['id'=> $data['bmiRoutine']->getId()])}}"><img src="{{ asset('/icons/file-earmark-text.svg') }}" </a></td>
                  		</tr>
                  	  </tbody>
                  	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

