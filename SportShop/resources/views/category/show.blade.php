@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["name"] }}</div>

                <div class="card-body"> 
                    
                    <b>Category:</b> {{ $data["name"] }}<br />
                    <b>Description:</b> {{ $data["description"] }}<br />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection