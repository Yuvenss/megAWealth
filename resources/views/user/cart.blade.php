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
<div class="container">
    <div class="mt-3" style="text-align:center; color: white; font-size: 32pt; font-weight: 700">
        <div>Your cart</div>
    </div>
    @if (count($cartItems) == 0)
        <div class="mt-3" style="text-align: center; color: white; font-size: 20pt; font-weight: 700">
            <div>No Data in Cart yet!</div>
        </div>
    @endif
    <div class="row mt-4">
        @foreach ($cartItems as $item)
            <div class="col-sm-3">
                <div class="card" style="border-radius: 10px">
                    <img src="{{ file_exists(public_path($item->property->property_image)) ? asset($item->property->property_image) : asset('storage/'.$item->property->property_image) }}" class="card-img-top" alt="..." style="height: 160px; border-top-left-radius: 10px; border-top-right-radius: 10px">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title" style="margin: 0">${{ $item->property->property_price }}{{ $item->property->property_sales_type == 'Rent' ? ' / month' : '' }}</h5>
                        <p class="card-text">{{ $item->property->property_address }}</p>
                        <span class="badge bg-warning">{{ $item->property->property_type }}</span>
                        <span class="badge" style="background-color: #FF9F46">{{ $item->created_at }}</span>
                        <div class="d-flex mt-4" style="justify-content: space-around">
                            <a href="/cart/{{ $item->property->property_id }}/remove" class="btn" onclick="return confirm('Are you sure you want to remove this item?')" style="background-color: #FC5050; color: white;font-weight: 600">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $cartItems->links() }}
    </div>
    <div class="d-flex mt-4 mb-5" style="justify-content: space-around">
        <a href="/checkout" class="btn" onclick="return confirm('Are you sure you want to remove this item?')" style="background-color: #65B5FF; color: white;font-weight: 600;font-size: 20pt">Checkout</a>
    </div>
</div>

@endsection
