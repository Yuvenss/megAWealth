@extends('partial.main')
@section('content')

@include('partial.adminNavbar')
<div class="mt-3" style="text-align:center ;color: white; font-size: 28pt; font-weight: 700">
    <div>Update Office</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex" style="align-items: center">
            <img src="{{ file_exists(public_path($office->office_image)) ? asset($office->office_image) : asset('storage/'.$office->office_image) }}" alt="" class="mt-3 mb-5" style="width: 100%">
        </div>
        <div class="col-md-6">
            <div class=" mt-3 p-4 mb-5" style="background-color: white; border-radius: 10px">
            <form action="/offices/{{ $office->office_id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Office Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter office name here..." style="border: 1.5px solid #F76F12" value="{{ $office->office_name }}" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Office Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="address" placeholder="Enter office address here..." style="border: 1.5px solid #F76F12">{{ $office->office_address }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact Name</label>
                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="Enter contact name here..." style="border: 1.5px solid #F76F12" value="{{ $office->office_contact_name }}">
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter phone number here..." style="border: 1.5px solid #F76F12" value="{{ $office->office_phone_num }}">
                    @error('phone')
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
