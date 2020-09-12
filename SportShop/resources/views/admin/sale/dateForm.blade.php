@extends('admin.menu')

@section('menu_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Sales List 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.sale.query1') }}" enctype="multipart/form-data" class="form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Initial Date</label>
                                <input type="date" class="form-control" name="startDate"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>End Date</label>
                                <input type="date" class="form-control" name="endDate"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-outline-success btn-block">Search</button>
                            </div>
                        </div>
                    </form>
                    <main class="py-4">
                        @yield('result')
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection