@extends('master')
@section('title','Parshad Dashboard')
@section('content')
<div class="maindiv">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        <p class="h4 mb-4">Ward No -
            {{str_pad(Auth::user()->wards->ward_no,2,0,STR_PAD_LEFT)??'N/A'}}
            ({{Auth::user()->wards->ward_name??'N/A'}})
        </p>

        <div class="form-row mb-4">
            <!-- E-mail -->
            <a href="{{route('parshad.create.surveyor')}}" class="btn btn-wa"> Create Survey User</a>
            <a href="{{route('parshad.list.surveyor')}}" class="btn btn-wa"> List Survey User</a>
            <a href="{{route('parshad.create.booth.agent')}}" class="btn btn-wa">Create Poling Booth Agent</a>
            <a href="{{route('parshad.list.booth.agent')}}" class="btn btn-wa"> List Poling Booth Agent</a>
            <a href="" class="btn btn-wa">Reports</a>
            <a href="{{route('logout')}}" class="btn btn-wa">Logout</a>




            <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@endsection
