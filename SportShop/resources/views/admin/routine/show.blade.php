@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Routine Detail
                    <a class="btn btn-outline-info return-btn" href="{{ route('admin.routine.list') }}"><img src="{{ asset('/icons/arrow-return-left.svg') }}" class="delete-icon"></a>
                </div>
                <div class="card-body"> 
                    <b>Name:</b> {{ $data["routine"]->getName() }}<br />
                    <b>Description:</b> {{ $data["routine"]->getDescription() }}<br />
                    <b>The minimum body mass for this routine is:</b> {{ $data["routine"]->getMinMasa() }}<br />
                    <b>The maximum body mass for this routine is:</b> {{ $data["routine"]->getMaxMasa() }}<br />
                    <br>
                    <div class="row">
                        <div class="col-sm-5 update-btn">
                            <a class="btn btn-outline-success btn-block" href="{{ route('admin.routine.update_form',['id'=> $data['routine']->getId()]) }}">Update</a>
                        </div>
                        <div class="col-sm-5 delete-btn">
                        	<a class="btn btn-outline-danger btn-block" href="{{ route('admin.routine.delete',['id'=> $data['routine']->getId()]) }}" onclick="return confirm('Are you sure to delete this routine?')">Delete Routine</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
