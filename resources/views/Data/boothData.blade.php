@extends('master')
@section('title','Booth Data Entry')
@section('content')
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="boothData" action="{{route('agent.data.store')}}" method="POST">
        @csrf
        <p class="titlesection">Polling Booth Data</p>

        <div class="row mx-0">
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Ward No required">
                    <label for="ward_no" class="labelinput">Ward No - <span class="pl-2">{{$user->parshads->wards->ward_no??''}}</span></label>
                    <!-- <input type="text" id="ward_no" value="{{$user->parshads->wards->ward_no??''}}" name="ward_no"
                        class="input_section form-control mb-0 only-num validate_this"
                        @if(isset($user->parshads->wards->ward_no)) readonly
                    @endif /> -->
                    <input type="hidden" name="ward_id" value="{{$user->parshads->ward_id}}" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Part No required">
                    <label for="part_no" class="labelinput">Part No - <span class="pl-2">{{$user->part_nos->part_no??''}}</span></label>
                    <!-- <input type="text" id="part_no" name="part_no" value="{{$user->part_nos->part_no??''}}"
                        class="input_section form-control mb-0 only-num validate_this"
                        @if(isset($user->part_nos->part_no)) readonly
                    @endif /> -->
                    <input type="hidden" name="part_id" value="{{$user->part_id}}" />
                </div>
            </div>
            <div class="">
                <div class="form-row mb-4" data-validate="Serial No required">
                    <label for="s_no" class="labelinput">Serial No</label>
                    <input type="text" id="s_no" name="s_no" value="{{old('s_no')}}"
                        class="input_section form-control mb-0 only-num validate_this" />
                </div>
            </div>
        </div>

<div class="imagesection">
 <img class="w-100" src="img/dataimg.jpeg"/>
</div>
        <input type="hidden" name="id" value="">
        <div class="submitbtn">
            <button class="submitbutton btn btnblue btn-block submit_button" data-id="boothData" type="submit">
                Save
            </button>
        </div>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@stop
