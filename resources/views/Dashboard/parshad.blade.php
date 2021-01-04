@extends('master')
@section('title','Parshad Dashboard')
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

    .summary {
        font-size: 15px;
        font-weight: 600;
        background-color: #fff;
        color: #fff;
        padding: 7px 13px;
        margin-top: 20px;
        outline: none;
        border: 1px solid #012954;
        border-radius: 0.25rem;
        text-align: left;
        cursor: pointer;
        margin-top: 0px;
        position: relative;
        background: #012954;
        width: 100%;
    }
</style>
<div class="maindiv">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        <p class="h5 mb-3">Ward No -
            {{str_pad(Auth::user()->wards->ward_no,2,0,STR_PAD_LEFT)??'N/A'}}
        </p>
        <p class="h5 mb-3">
            ({{Auth::user()->wards->ward_name??'N/A'}})
        </p>

        <div class="form-row mb-4">
            <details class="mb-3 mt-3">
                <summary> <i class="fas fa-user-friends mr-3"></i> Survey</summary>
                <div class="faq__content">
                    <div class="submenu">
                        <a href="{{route('parshad.create.surveyor')}}"> Create User </a>
                        <a href="{{route('parshad.list.surveyor')}}">User List </a>
                        <a href="{{route('report.survey')}}">Report </a>
                    </div>
                </div>
            </details>
            <details>
                <summary>
                    <i class="fas fa-vote-yea mr-3"></i> Poling Booth</summary>
                <div class="faq__content">
                    <div class="submenu">
                        <a href="{{route('parshad.create.booth.agent')}}">Create Agent </a>
                        <a href="{{route('parshad.list.booth.agent')}}">Agent List </a>
                        <a href="{{route('report.polingbooth')}}">Report</a>

                    </div>
                </div>
            </details>
                <a href="{{route('sendsms')}}" class="summary">
                    <i class="fas fa-sms mr-3"></i> Send SMS</a>

            <!-- <a href="{{route('parshad.create.surveyor')}}" class="w-100 serverdashboard"  class="">

             <div class="row mx-0">
            <div class="width-40">
           <i class="fas fa-user-friends"></i>
            </div>
            <div class="width-60">
             <div class="titlemenu">
                   Create Survey User
                </div>
            </div>
            </div>
         </a> -->
            <!-- <a href=""  class="w-100 serverdashboard" >

              <div class="row mx-0">
            <div class="width-40">
      <i class="fas fa-list"></i>
            </div>
            <div class="width-60">
             <div class="titlemenu">
                    List Survey User
                </div>
            </div>
            </div>
             </a> -->
            <!-- <a href="{{route('parshad.create.booth.agent')}}" class="w-100 serverdashboard" >
               <div class="row mx-0">
            <div class="width-40">
            <i class="fas fa-database"></i>
            </div>
            <div class="width-60">
             <div class="titlemenu">
                  Create Poling Booth Agent
                </div>
            </div>
            </div>

            </a> -->
            <!-- <a href="{{route('parshad.list.booth.agent')}}"  class="w-100 serverdashboard" >
              <div class="row mx-0">
            <div class="width-40">
            <i class="fas fa-database"></i>
            </div>
            <div class="width-60">
             <div class="titlemenu">
                   List Poling Booth Agent
                </div>
            </div>
            </div>

             </a> -->

            <!-- <a href="{{route('logout')}}" class="btn btn-wa">Logout</a> -->




            <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@endsection
