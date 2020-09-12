@extends('user.routine.menu')

@section('routine_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Calculated data</div>

                <div class="card-body"> 
                    <b>Your Body Mass Index is:</b> {{ $data['bodyMI'] }}<br />
                    <b>Your body state is:</b> {{ $data['stateBody'] }}<br />
                    <table class="table table-striped">
            		  <thead>
                    	<tr>
                  			<th>Recommended Routine</th>
                  			<th>Show</th>
               			</tr>
               		  </thead>
               		  <tbody>
                    	<tr>
                  			<td>{{ $data['bmiRoutine']->getName() }}</td>
                  			<td><a class="navbar-brand" href="{{ route('user.routine.show',['id'=> $data['bmiRoutine']->getId()])}}"><img src="/icons/eye.svg" </a></td>
                  		</tr>
                  	  </tbody>
                  	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

