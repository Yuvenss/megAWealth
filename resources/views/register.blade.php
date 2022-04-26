@extends('partial.main')
@section('content')

@include('partial.guestNavbar')
<div class="container-fluid">
    <div class="mt-3" style="text-align: center; color: white; font-size: 32pt; font-weight: 700">
        <div>REGISTER</div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5 mt-3 p-4 mb-5" style="background-color: white; border-radius: 10px">
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name here..." style="border: 1.5px solid #F76F12" value="{{ old('name') }}" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email address here..." style="border: 1.5px solid #F76F12" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="pass" name="password" placeholder="Enter your password here..." style="border: 1.5px solid #F76F12">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="confirmPass" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="confirmPass" name="password_confirmation" placeholder="Re-type your password here..." style="border: 1.5px solid #F76F12">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn" style="background-color: #FF9F46; color: white; font-weight: 600; font-size: 14pt">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
