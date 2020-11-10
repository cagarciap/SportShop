@extends('layouts.master')

@section("title", "Allies Products Menu")

@section('content')
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            {{ __('ally.products') }}
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('user.ally.list') }}" class="list-group-item list-group-item-action bg-light">{{ __('ally.list') }}</a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <img src="{{ asset('/icons/arrow-left-right.svg') }}" class="menu-icon" id="menu-toggle">
        </nav>

        <main class="container-fluid">
            @yield('ally_content')
        </main>
    </div>
  </div>

@endsection
