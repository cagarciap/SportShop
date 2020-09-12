@extends('user.routine.menu')

@section('routine_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Routine Detail</div>

                <div class="card-body">
                	<b>Name:</b> {{ $data["routine"]->getName() }}<br />
                    <b>Description:</b> {{ $data["routine"]->getDescription() }}<br />
                    <b>The minimum body mass for this routine is:</b> {{ $data["routine"]->getMinMasa() }}<br />
                    <b>The maximum body mass for this routine is:</b> {{ $data["routine"]->getMaxMasa() }}<br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
