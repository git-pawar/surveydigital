@extends('master')
@section('title','Booth Agent Dashboard')
@section('content')
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        {{-- <p class="h4 mb-4">Ward No - {{Auth::guard('admin')->user()->ward_no??'N/A'}}</p> --}}

        <div class="form-row mb-4">
            <!-- E-mail -->
            <a href="{{route('agent.store.data')}}" class="btn btn-wa">Booth Data</a>
            <a href="{{route('logout')}}" class="btn btn-wa">Logout</a>
            <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@endsection
