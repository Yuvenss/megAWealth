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
        <div>Manage Company</div>
    </div>
    <div class="mt-3 mb-4">
        <a href="/offices/create" class="btn" style="background-color: #65B5FF; font-size: 15pt; font-weight: 600; color: white">+ Add Office</a>
    </div>
    <div class="row">
        @if (count($offices) == 0)
            <div class="mt-3" style="text-align: center; color: white; font-size: 20pt; font-weight: 700">
                <div>No Data Office!</div>
            </div>
        @endif
        @foreach ($offices as $office)
            <div class="col-sm-3">
                <div class="card" style="border-radius: 10px">
                    <img src="{{ file_exists(public_path($office->office_image)) ? asset($office->office_image) : asset('storage/'.$office->office_image) }}" class="card-img-top" alt="..." style="height: 160px; border-top-left-radius: 10px; border-top-right-radius: 10px">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title" style="margin: 0">{{ $office->office_name }} Office</h5>
                        <p class="card-text">{{ $office->office_address }}</p>
                        <p style="font-weight: 600; font-size:13pt; margin:0">Contact</p>
                        <p style="margin: 0">{{ $office->office_contact_name }}</p>
                        <p>{{ $office->office_phone_num }}</p>
                        <div class="d-flex" style="justify-content: space-around">
                            <a href="/offices/{{ $office->office_id }}/edit" class="btn" style="background-color: #65B5FF; color: white;font-weight: 600">Update</a>
                            <form action="/offices/{{ $office->office_id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this item?')" style="background-color: #FC5050; color: white;font-weight: 600">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $offices->links() }}
    </div>
</div>

@endsection
