@extends('master')
@section('title','Surveyor Dashboard')
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
        font-size: 17px;
        font-weight: 500;
        text-align: left;
        padding-left: 15px;
    }
</style>
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        {{-- <p class="h4 mb-4">Ward No - {{Auth::guard('admin')->user()->ward_no??'N/A'}}</p> --}}

        <div class="form-row mb-4">
            <!-- E-mail -->
            <a href="{{route('surveyor.store.data')}}" class="serverdashboard">
                <div class="row mx-0">
                    <div class="width-40">
                        <i class="fas fa-poll"></i>
                    </div>
                    <div class="width-60">
                        <div class="titlemenu">
                            Detail Survey
                        </div>
                    </div>
                </div>

            </a>
            <a href="{{route('surveyor.short.survey')}}" class="serverdashboard">
                <div class="row mx-0">
                    <div class="width-40">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="width-60">
                        <div class="titlemenu">
                            Short Survey
                        </div>
                    </div>
                </div>

            </a>
            <a href="{{route('surveyor.report')}}" class="serverdashboard">
                <div class="row mx-0">
                    <div class="width-40">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <div class="width-60">
                        <div class="titlemenu">
                            Report
                        </div>
                    </div>
                </div>

            </a>
            <!-- <a href="{{route('logout')}}" class="btn btn-wa">Logout</a> -->
            <!-- Terms of service -->
            <div class="serverybox">
                <div class="row">

                </div>
            </div>
        </div>
    </form>

    <!-- Default form register -->
</div>
@endsection
