@extends('partial.main')
@section('content')

@include('partial.guestNavbar')
<div style="padding-top:80px; background-image: url({{ asset('frontend/home.jpg') }}); height: 60vh; background-attachment: fixed; background-size: cover; background-position:center">
    <div class="col-4 m-auto mb-5" style="background-color: rgba(0,0,0,.4); color: white; text-align:center; font-size:28pt; font-weight: 750">Find Your Future Home</div>
    <form class="d-flex col-11 m-auto" action="" method="GET" style="justify-content: space-between">
        @csrf
        <input class="form-control" type="text" placeholder="Enter a City, Property Type, Buy or Rent..." name="search" style="width: 90%">
        <input class="btn" type="submit" value="Search" style="width: 8%; color: white; background-color: #FF9F46; font-weight: 600; font-size: 14pt">
    </form>
</div>
<div class="d-flex mt-5 mb-5" style="justify-content: space-evenly">
    <a href="" class="card" style="width: 18rem; text-decoration: none; color: black; border-radius: 10px" onmouseover="cardOver(this)" onmouseout="cardOut(this)">
        <img src="{{ asset('frontend/buyicon.jpg') }}" class="card-img-top" alt="..." style="height: 160px; border-top-left-radius: 10px; border-top-right-radius: 10px">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">Buy Real Estates</h5>
        </div>
    </a>
    <a href="" class="card" style="width: 18rem; text-decoration: none; color: black; border-radius: 10px" onmouseover="cardOver(this)" onmouseout="cardOut(this)">
        <img src="{{ asset('frontend/renticon.jpg') }}" class="card-img-top" alt="..." style="height: 160px; border-top-left-radius: 10px; border-top-right-radius: 10px">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">Rent Real Estates</h5>
        </div>
    </a>
    <a href="" class="card" style="width: 18rem; text-decoration: none; color: black; border-radius: 10px" onmouseover="cardOver(this)" onmouseout="cardOut(this)">
        <img src="{{ asset('frontend/abouticon.jpg') }}" class="card-img-top" alt="..." style="height: 160px; border-top-left-radius: 10px; border-top-right-radius: 10px">
        <div class="card-body" style="text-align: center">
            <h5 class="card-title">About Us</h5>
        </div>
    </a>
</div>

@endsection
