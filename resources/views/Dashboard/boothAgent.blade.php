@extends('master')
@section('title','Booth Agent Dashboard')
@section('content')
<style>
.width-40 {
    width: 28%;
    font-size: 32px;
    padding: 10px 3px;
    color: #ffffff;

    background: #012954;
}
.width-60 {
      width: 72%;
    padding: 18px 0px;
    color: #060606;
    font-size: 15px;
    font-weight: 500;
    text-align: left;
    padding-left: 9px;
}
.serverdashboard {
    width: 100%;
    border: 1px dashed #ccc;
    margin: 8px auto 0px !important;
}
</style>
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        {{-- <p class="h4 mb-4">Ward No - {{Auth::guard('admin')->user()->ward_no??'N/A'}}</p> --}}

        <div class="form-row mb-4">
            <!-- E-mail -->
            <a href="{{route('agent.store.data')}}" class="serverdashboard">
           <div class="row mx-0">
            <div class="width-40">
           <i class="fas fa-user-friends"></i>
            </div>
            <div class="width-60">
             <div class="titlemenu">
              Booth Data
                </div>
            </div>
            </div>

            </a>

            <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@endsection
