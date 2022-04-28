@extends('partial.main')
@section('content')

@include('partial.adminNavbar')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <div class="mt-3" style="text-align: center; color: white; font-size: 28pt; font-weight: 700">
        <div>Manage Real Estates</div>
    </div>
    <div class="mt-3 mb-4">
        <a href="/properties/create" class="btn" style="background-color: #65B5FF; font-size: 15pt; font-weight: 600; color: white">+ Add Real Estate</a>
    </div>
    <div class="row">
        @if (count($properties) == 0)
            <div class="mt-3" style="text-align: center; color: white; font-size: 20pt; font-weight: 700">
                <div>No Data Real Estate!</div>
            </div>
        @endif
        @foreach ($properties as $property)
            <div class="col-sm-3">
                <div class="card" style="border-radius: 10px">
                    <img src="{{ file_exists(public_path($property->property_image)) ? asset($property->property_image) : asset('storage/'.$property->property_image) }}" class="card-img-top" alt="..." style="height: 160px; border-top-left-radius: 10px; border-top-right-radius: 10px">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title" style="margin: 0">${{ $property->property_price }}{{ $property->property_sales_type == 'Rent' ? ' / month' : '' }}</h5>
                        <p class="card-text">{{ $property->property_address }}</p>
                        <span class="badge bg-warning">{{ $property->property_type }}</span>
                        <span class="badge" style="background-color: #FF9F46">{{ $property->property_sales_type }}</span>
                        <span class="badge" style="background-color: #F76F12">{{ $property->property_status }}</span>
                        <div class="d-flex mt-4" style="justify-content: space-around">
                            <a href="/properties/{{ $property->property_id }}/edit" class="btn" style="background-color: #65B5FF; color: white;font-weight: 600">Update</a>
                            <form action="/properties/{{ $property->property_id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this item?')" style="background-color: #FC5050; color: white;font-weight: 600">Delete</button>
                            </form>
                            @if ($property->property_status == 'Booked')
                                <a href="/properties/{{ $property->property_id }}/finish" class="btn" style="background-color: green; color: white;font-weight: 600">Finish</a>
                            @endif
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
