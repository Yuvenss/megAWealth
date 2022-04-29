@extends('partial.main')
@section('content')

@include('partial.adminNavbar')
<div class="mt-3" style="text-align:center ;color: white; font-size: 28pt; font-weight: 700">
    <div>Update Office</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex" style="align-items: center">
            <img src="{{ file_exists(public_path($property->property_image)) ? asset($property->property_image) : asset('storage/'.$property->property_image) }}" alt="" class="mt-3 mb-5" style="width: 100%">
        </div>
        <div class="col-md-6">
            <div class=" mt-3 p-4 mb-5" style="background-color: white; border-radius: 10px">
            <form action="/properties/{{ $property->property_id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="sales" class="form-label">Sales Type</label>
                    <select class="form-select @error('sales') is-invalid @enderror" id="sales" name="sales"  style="border: 1.5px solid #F76F12">
                        <option value="Rent" {{ $property->property_sales_type == 'Rent' ? 'selected' : '' }}>Rent</option>
                        <option value="Sale" {{ $property->property_sales_type == 'Sale' ? 'selected' : '' }}>Sale</option>
                    </select>
                    @error('sales')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Building Type</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type"  style="border: 1.5px solid #F76F12">
                        <option value="Apartment" {{ $property->property_type == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="House" {{ $property->property_type == 'House' ? 'selected' : '' }}>House</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter property price in $ here..." style="border: 1.5px solid #F76F12" value="{{ $property->property_price }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Location</label>
                    <textarea class="form-control @error('location') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="location" placeholder="Enter property location here..." style="border: 1.5px solid #F76F12">{{ $property->property_address }}</textarea>
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn" style="background-color: #FF9F46; color: white; font-weight: 600; font-size: 14pt">Update</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection
