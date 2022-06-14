@extends('partial.main')
@section('content')

@include('partial.guestNavbar')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="mt-3" style="text-align: center; color: white; font-size: 32pt; font-weight: 700">
    @if (isset($admin))
        <div>LOGIN ADMIN</div>
    @else
        <div>LOGIN</div>
    @endif
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-3 p-4 mb-5" style="background-color: white; border-radius: 10px">
            <form
            @if (isset($admin))
                action="/loginAdmin"
            @else
                action="/login"
            @endif
            method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email address here..." style="border: 1.5px solid #F76F12" value="{{ Cookie::get('LoginEmail') !== NULL ? Cookie::get('LoginEmail') : old('email') }}" {{-- value="{{ old('email') }}" --}} autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="pass" name="password" placeholder="Enter your password here..." style="border: 1.5px solid #F76F12" value="{{ Cookie::get('LoginPassword') !== NULL ? Cookie::get('LoginPassword') : '' }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" style="border: 1.5px solid #F76F12" checked={{ Cookie::get('LoginCookie') !== NULL }}>
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn" style="background-color: #FF9F46; color: white; font-weight: 600; font-size: 14pt">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
