@extends('partial.main')
@section('content')

@auth
    @include('partial.userNavbar')
@else
    @include('partial.guestNavbar')
@endauth


@endsection
