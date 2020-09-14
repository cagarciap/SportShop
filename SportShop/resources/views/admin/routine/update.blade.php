@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Routine Information </div>
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
                                <label>Routine Name</label>
                                <input type="text" class="form-control" placeholder="{{ $data['routine']->getName() }}" name="name" value="{{ $data['routine']->getName() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Routine Description</label>
                                <input type="text" class="form-control" placeholder="{{ $data['routine']->getDescription() }}" name="description" value="{{ $data['routine']->getDescription() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Minimum BMI</label>
                                <input type="number" class="form-control" placeholder="{{ $data['routine']->getMinMasa() }}" name="minMasa" value="{{ $data['routine']->getMinMasa() }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Maximum BMI</label>
                                <input type="number" class="form-control" placeholder="{{ $data['routine']->getMaxMasa() }}" name="maxMasa" value="{{ $data['routine']->getMaxMasa() }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-outline-success btn-block">Update Routine</button>
                            </div>
                            <div class="form-group col-md-6">
                                <a class="btn btn-outline-danger btn-block" href="{{ route('admin.routine.delete',['id'=> $data['routine']->getId()]) }}" onclick="return confirm('Are you sure to delete this routine?')">Delete Routine</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection