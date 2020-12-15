@extends('master')
@section('title','Create Survey User')
@section('content')
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="surveyorStore" action="{{route('parshad.store.surveyor')}}" method="POST">
        @csrf
        <p class="titlesection">Create Survey User</p>

        <div class="form-row mb-2" data-validate="Name is required">
            <label for="name" class="labelinput">Name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}"
                class="input_section form-control mb-0 validate_this" />
        </div>

        <div class="form-row mb-2" data-validate="Mobile no is not valid">
            <label for="mobile" class="labelinput">Mobile</label>
            <input type="number" id="mobile" name="mobile" value="{{old('mobile')}}"
                class="input_section form-control mb-0 validate_this only-num" data-len="10" />
        </div>
        <div class="form-row mb-2" data-validate="Password is required">
            <label for="password" class="labelinput">Password</label>
            <input type="text" id="password" name="password" value="{{old('password')}}"
                class="input_section form-control mb-0 validate_this" />
        </div>
        <div class="form-row mb-2" data-validate="Select Bhag Kramank / Part.">
            <label for="part_id" class="labelinput">Bhag Kramank / Part.</label>
            <select class="browser-default custom-select input_section selet validate_this" id="part_id" name="part_id"
                onchange="getSection(this,'{{route('getSection')}}','section_id','{{$ward_id??''}}','');">
                <option value="" selected>Select</option>
                @if (count($part_no))
                @foreach ($part_no as $item)
                <option value="{{$item->part_no.','.$item->id}}" @if (old('part_id')==$item->part_no.','.$item->id)
                    selected
                    @endif>{{$item->part_name??''}}({{$item->part_no??''}})</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="form-row mb-2" data-validate="Section is required">
            <label for="section_id" class="labelinput">Section</label>
            <select class="browser-default custom-select input_section selet" id="section_id" name="section_id"
                onchange="getSectionData(this,'{{route('getSectionData')}}','sectionData','');">
                <option value="" selected>Select</option>
            </select>
        </div>
        <div class="mb-1" id="sectionData">
        </div>
        <div class="row mx-0">
            <div class="width-50">
                <div class="form-row mb-4" data-validate="S.no.from is required">
                    <label for="s_no_from" class="labelinput">S.no.from</label>
                    <input type="number" id="s_no_from" name="s_no_from" value="{{old('s_no_from')}}"
                        class="input_section form-control mb-0 validate_this only-num minMax" data-min="minSNo"
                        data-max="maxSNo" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="S.no.to is required">
                    <label for="s_no_to" class="labelinput">S.no.to</label>
                    <input type="number" id="s_no_to" name="s_no_to" value="{{old('s_no_to')}}"
                        class="input_section form-control mb-0 validate_this only-num minMax" data-min="s_no_from"
                        data-max="maxSNo" />
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="">
        <input type="hidden" id="minSNo" value="">
        <input type="hidden" id="maxSNo" value="">
        <div class="submitbtn">
            <button class="submitbutton btn btnblue btn-block submit_button" data-id="surveyorStore" type="submit">
                Save
            </button>
        </div>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
<script>
    $(document).ready(function(){
        getSection(this,'{{route('getSection')}}','section_id','{{old('section_id')}}');
    });
</script>
@stop
