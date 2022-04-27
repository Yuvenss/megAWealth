@extends('partial.main')
@section('content')

@auth
    @if (auth()->user()->is_admin)
        @include('partial.adminNavbar')
    @else
        @include('partial.userNavbar')
    @endif
@else
    @include('partial.guestNavbar')
@endauth

<div style="padding-top:80px; background-image: url('/frontend/aboutusbanner.jpg'); height: 60vh; background-attachment: fixed; background-size: cover; background-position:bottom">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: -80px">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: -80px">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <p class="fs-1 text-white text-center fw-bold pt-5">About Our Company</p>
    <p class="fs-3 text-white text-center">Our company was founded at 2008 by our founder Renanda. At that time, we started as <br>
        law firm specializing in real estate and construction. In 2012, our company expanded <br>
        our service to real estates with the included service of real estates lawyers. Today, our <br>
        company have 5 offices throughout the states and is planning to build more.
    </p>
    
</div>