@extends('layouts.master')

@section("title", "User Routine Menu")

@section('content')
<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            User Routine Control
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('user.routine.recommend') }}" class="list-group-item list-group-item-action bg-light">Routine recommended</a>
            <a href="{{ route('user.routine.list') }}" class="list-group-item list-group-item-action bg-light">Routine List</a>
            <a href="{{ route('user.routine.myroutine') }}" class="list-group-item list-group-item-action bg-light">My Routine</a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <img src="/icons/arrow-left-right.svg" class="menu-icon" id="menu-toggle">
        </nav>

        <main class="container-fluid">
            @yield('routine_content')
        </main>
    </div>
  </div>

@endsection
