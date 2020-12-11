@extends('master')
@section('title','Voter List')
@section('content')

<style>

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
       <img src="../img/1.PNG" class="w-100 h-100"/>
    <div class="green_box"></div>
    </div>
  </div>
  <div class="width-33">
     <div class="listimg">
       <img src="{{url('img/1.PNG')}}" class="w-100 h-100"/>
       <div class="yellow_box"></div>
    </div>
  </div>
    <div class="width-33">
     <div class="listimg">
       <img src="{{url('img/1.PNG')}}" class="w-100 h-100"/>
          <div class="red_box"></div>
    </div>
  </div>
    <div class="width-33">
     <div class="listimg">
       <img src="{{url('img/1.PNG')}}" class="w-100 h-100"/>
          <div class="yellow_box"></div>
    </div>
  </div>
  </div>
 </div>

@endsection
