@extends('partial.main')
@section('content')

@auth
    @include('partial.userNavbar')
@else
    @include('partial.guestNavbar')
@endauth
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container mt-5">
    <form class="d-flex m-auto" action="/search" method="GET" style="justify-content: space-between">
        @csrf
        <input type="hidden" name="sales_type" value="Rent">
        <input class="form-control" type="text" placeholder="Enter a City, Property Type..." name="search" style="width: 90%">
        <input class="btn" type="submit" value="Search" style="width: 8%; color: white; background-color: #FF9F46; font-weight: 600; font-size: 14pt">
    </form>
    <div class="mt-4" style="color: white; font-size: 28pt; font-weight: 700">
        <div>Showing Real Estates for Rent</div>
    </div>
    @if (count($properties) == 0)
        <div class="mt-3" style="text-align: center; color: white; font-size: 20pt; font-weight: 700">
            <div>No Data Property!</div>
        </div>
    @endif
    <div class="row mt-4">
        @foreach ($properties as $property)
            <div class="col-sm-3">
                <div class="card" style="border-radius: 10px">
                    <img src="{{ file_exists(public_path($property->property_image)) ? asset($property->property_image) : asset('storage/'.$property->property_image) }}" class="card-img-top" alt="..." style="height: 160px; border-top-left-radius: 10px; border-top-right-radius: 10px">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title" style="margin: 0">${{ $property->property_price }} / month</h5>
                        <p class="card-text">{{ $property->property_address }}</p>
                        <span class="badge bg-warning">{{ $property->property_type }}</span>
                        <div class="d-flex mt-4" style="justify-content: space-around">
                            <a
                            @auth
                                href="/cart/{{ $property->property_id }}/add"
                            @else
                                href="/login"
                            @endauth
                            class="btn" style="background-color: #65B5FF; color: white;font-weight: 600">Rent</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $properties->links() }}
    </div>
</div>

@endsection
