@extends('master')
@section('title','Surveyor Dashboard')
@section('content')
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        {{-- <p class="h4 mb-4">Ward No - {{Auth::guard('admin')->user()->ward_no??'N/A'}}</p> --}}

        <div class="form-row mb-4">
            <!-- E-mail -->
            <a href="{{route('surveyor.store.data')}}" class="btn btn-wa">Survey Data</a>
            <a href="{{route('logout')}}" class="btn btn-wa">Logout</a>

            <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@endsection
