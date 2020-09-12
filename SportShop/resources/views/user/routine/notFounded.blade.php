@extends('user.routine.menu')

@section('routine_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Error</div>

                <div class="card-body">
                	<b>There is no routine for your BMI, try again<br />
                	<div class="option-button">
                        <a class="btn btn-outline-success btn-block" href="{{ route('user.routine.recommend') }}">Recommend Again</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection