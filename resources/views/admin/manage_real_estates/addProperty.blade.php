@extends('partial.main')
@section('content')

@include('partial.adminNavbar')
<div class="mt-3" style="text-align: center; color: white; font-size: 28pt; font-weight: 700">
    <div>Add Real Estate</div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-3 p-4 mb-5" style="background-color: white; border-radius: 10px">
            <form action="/properties" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="sales" class="form-label">Sales Type</label>
                    <select class="form-select @error('sales') is-invalid @enderror" id="sales" name="sales"  style="border: 1.5px solid #F76F12">
                        <option value="0">Choose the type of sales</option>
                        <option value="Rent" {{ old('sales') == 'Rent' ? 'selected' : '' }}>Rent</option>
                        <option value="Sale" {{ old('sales') == 'Sale' ? 'selected' : '' }}>Sale</option>
                    </select>
                    @error('sales')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Building Type</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type"  style="border: 1.5px solid #F76F12">
                        <option value="0">Choose the building type</option>
                        <option value="Apartment" {{ old('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="House" {{ old('type') == 'House' ? 'selected' : '' }}>House</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter property price in $ here..." style="border: 1.5px solid #F76F12" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Location</label>
                    <textarea class="form-control @error('location') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="location" placeholder="Enter property location here..." style="border: 1.5px solid #F76F12">{{ old('location') }}</textarea>
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="formFile" class="form-label">Upload the Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image" style="border: 1.5px solid #F76F12;">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn" style="background-color: #FF9F46; color: white; font-weight: 600; font-size: 14pt">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
