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
<div style="padding-top:80px; background-image: url('/frontend/home.jpg'); height: 550px; background-attachment: fixed; background-size: cover; background-position:center">
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
    <div class="col-4 m-auto mb-5 mt-5" style="background-color: rgba(0,0,0,.4); color: white; text-align:center; font-size:28pt; font-weight: 750">Find Your Future Home</div>
    <form class="d-flex col-11 m-auto" action="" method="GET" style="justify-content: space-between">
        @csrf
        <input class="form-control" type="text" placeholder="Enter a City, Property Type, Buy or Rent..." name="search" style="width: 90%">
        <input class="btn" type="submit" value="Search" style="width: 8%; color: white; background-color: #FF9F46; font-weight: 600; font-size: 14pt">
    </form>
</div>
<div class="d-flex mt-5 mb-5" style="justify-content: space-evenly">
    <a
    @if (auth()->user() && auth()->user()->is_admin)
        href="/properties"
    @else
        href="/buy"
    @endif
    class="card" style="width: 20rem; text-decoration: none; color: black; border-radius: 10px" onmouseover="cardOver(this)" onmouseout="cardOut(this)">
        <img src="/frontend/buyicon.jpg" class="card-img-top" alt="..." style="height: 240px; border-top-left-radius: 10px; border-top-right-radius: 10px">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">Buy Real Estates</h5>
        </div>
    </a>
    <a
    @if (auth()->user() && auth()->user()->is_admin)
        href="/properties"
    @else
        href="/rent"
    @endif
    class="card" style="width: 20rem; text-decoration: none; color: black; border-radius: 10px" onmouseover="cardOver(this)" onmouseout="cardOut(this)">
        <img src="/frontend/renticon.jpg" class="card-img-top" alt="..." style="height: 240px; border-top-left-radius: 10px; border-top-right-radius: 10px">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">Rent Real Estates</h5>
        </div>
    </a>
    <a
    @if (auth()->user() && auth()->user()->is_admin)
        href="/offices"
    @else
        href="/aboutUs"
    @endif
    class="card" style="width: 20rem; text-decoration: none; color: black; border-radius: 10px" onmouseover="cardOver(this)" onmouseout="cardOut(this)">
        <img src="/frontend/abouticon.jpg" class="card-img-top" alt="..." style="height: 240px; border-top-left-radius: 10px; border-top-right-radius: 10px">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">About Us</h5>
        </div>
    </a>
</div>

@endsection
