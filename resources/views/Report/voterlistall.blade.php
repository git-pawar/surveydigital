@extends('master')
@section('title','Voter List All')
@section('content')

<style>
.done
{

    background-color: white;
    -ms-transform: rotate(20deg);
    transform: rotate(20deg);
    position: absolute;
    border: 1px solid #ccc;
    padding: 0px 7px;
    font-size: 10px;
    font-weight: 600;
    right: 9px;

    top: 6px;
}

</style>
<div class="maininnersection px-2 position-relative">
  <p class="titlesection px-2">Voter List

  </p>
  <div class="topsection">
    <span class="">Ward No - 3</span>
  <span class="pl-2">Part - 1</span>
  </div>
  <div class="row mx-0">
  <div class="width-33">
     <div class="listimg">
       <img src="{{url('img/1.PNG')}}" class="w-100 h-100"/>
    <div class="green_box"></div>
    <span class="done">All</span>
    </div>
  </div>
  <div class="width-33">
     <div class="listimg">
       <img src="{{url('img/1.PNG')}}" class="w-100 h-100"/>
       <div class="yellow_box"></div>
        <span class="done">All</span>
    </div>
  </div>
    <div class="width-33">
     <div class="listimg">
       <img src="{{url('img/1.PNG')}}" class="w-100 h-100"/>
          <div class="red_box"></div>
               <span class="done">All</span>
    </div>
  </div>
    <div class="width-33">
     <div class="listimg">
       <img src="{{url('img/1.PNG')}}" class="w-100 h-100"/>
          <div class="yellow_box"></div>
               <span class="done">All</span>
    </div>
  </div>
  </div>
 </div>

@endsection
