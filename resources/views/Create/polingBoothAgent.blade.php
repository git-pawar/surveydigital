@extends('master')
@section('title','Poling Booth Agent')
@section('content')
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="agentStore" method="POST" action="{{route('parshad.store.booth.agent')}}">
        @csrf
        <p class="titlesection">Poling Booth Agent</p>

        <div class="form-row mb-2" data-validate="Name is required">
            <label for="name" class="labelinput">Name</label>
            <input type="text" id="name" name="name" class="input_section form-control mb-0 validate_this" />
        </div>

        <div class="form-row mb-2" data-validate="Mobile no is not valid">
            <label for="mobile" class="labelinput">Mobile</label>
            <input type="text" id="mobile" name="mobile" class="input_section form-control mb-0 validate_this only-num"
                data-len="10" />
        </div>
        <div class="form-row mb-2" data-validate="Select Bhag Kramank / Part.">
            <label for="part_id" class="labelinput">Bhag Kramank / Part.</label>
            <select class="browser-default custom-select input_section selet validate_this" id="part_id" name="part_id"
                onchange="getPolling(this,'{{route('getPolling')}}','polling_id','');">
                <option value="" selected>Select</option>
                @if (count($part_no))
                @foreach ($part_no as $item)
                <option value="{{$item->id}}" @if (old('part_id')==$item->id)
                    selected
                    @endif>{{$item->part_name??''}}({{$item->part_no??''}})</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="form-row mb-2" data-validate="Polling is required">
            <label for="polling_id" class="labelinput">Polling Booth</label>
            <select class="browser-default custom-select input_section selet validate_this" id="polling_id"
                name="polling_id"
                 onchange="getPollingData(this,'{{route('getPollingData')}}','pollingData','');"
                >
                <option value="" selected>Select</option>
            </select>
        </div>
        <input type="hidden" name="id" value="">
        <div class="submitbtn">
            <button class="submitbutton btn btnblue btn-block submit_button" data-id="agentStore" type="submit">
                Save
            </button>
        </div>
        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@stop
