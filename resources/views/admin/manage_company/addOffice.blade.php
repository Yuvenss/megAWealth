@extends('partial.main')
@section('content')

@include('partial.adminNavbar')
<div class="mt-3" style="text-align: center; color: white; font-size: 28pt; font-weight: 700">
    <div>Add Office</div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-3 p-4 mb-5" style="background-color: white; border-radius: 10px">
            <form action="/offices" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Office Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter office name here..." style="border: 1.5px solid #F76F12" value="{{ old('name') }}" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Office Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="address" placeholder="Enter office address here..." style="border: 1.5px solid #F76F12">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact Name</label>
                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="Enter contact name here..." style="border: 1.5px solid #F76F12" value="{{ old('contact') }}">
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter phone number here..." style="border: 1.5px solid #F76F12" value="{{ old('phone') }}">
                    @error('phone')
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
