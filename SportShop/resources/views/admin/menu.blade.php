@extends('layouts.master')

@section("title", "Product Menu")

@section('content')
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            {{$data["nameMenu"]}}
        </div>
        <div class="list-group list-group-flush">
            @foreach($data["routes"] as $route)
                <a href="{{ route($route['route']) }}" class="list-group-item list-group-item-action bg-light">{{ $route['title'] }}</a>
            @endforeach
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <img src="{{ asset('/icons/arrow-left-right.svg') }}" class="menu-icon" id="menu-toggle">
        </nav>

        <main class="container-fluid">
            @yield('menu_content')
        </main>
    </div>
  </div>

@endsection