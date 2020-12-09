@extends('master')
@section('title','Create Parshad')
@section('content')
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="parshadCreate" action="{{route('admin.create.parshad.process')}}" method="post">
        @csrf
        <p class="titlesection">Create Parshad</p>

        <div class="form-row mb-2" data-validate="Name is required">
            <label for="name" class="labelinput">Name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}"
                class="input_section form-control mb-0 validate_this" />
        </div>

        <div class="form-row mb-2" data-validate="Mobile no is not valid">
            <label for="mobile" class="labelinput">Mobile</label>
            <input type="text" id="mobile" name="mobile" value="{{old('mobile')}}"
                class="input_section form-control mb-0 validate_this only-num" data-len="10" />
        </div>
        <div class="form-row mb-2" data-validate="Email is not valid">
            <label for="email" class="labelinput">Email</label>
            <input type="text" id="email" name="email" value="{{old('email')}}"
                class="input_section form-control mb-0 validate_this" />
        </div>
        <div class="form-row mb-2" data-validate="Select a state">
            <label for="state" class="labelinput">State</label>
            <select class="browser-default custom-select input_section selet validate_this"
                onchange="getCity(this,'{{route('getCity')}}','city','');" id="state" name="state">
                <option value="" selected>Select</option>
                @if(count($state))
                @foreach ($state as $item)
                <option value="{{$item->id}}" @if ($item->id == old('state'))
                    selected
                    @endif>{{$item->state_name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="form-row mb-2" data-validate="Select a city">
            <label for="city" class="labelinput">City</label>
            <select class="browser-default custom-select input_section selet validate_this" id="city" name="city"
                onchange="getNN(this,'{{route('getNN')}}','nn_id','nnn_id','city','');">
                <option value="" selected>Select state first</option>
            </select>
        </div>
        <div class="form-row mb-2" data-validate="Select a NNN Type">
            <label for="nnn_id" class="labelinput">NNN Type</label>
            <select class="browser-default custom-select input_section selet validate_this" id="nnn_id" name="nnn_id"
                onchange="getNN(this,'{{route('getNN')}}','nn_id','nnn_id','city','');">
                <option value="" selected>Select</option>
                @if(count($nnn_type))
                @foreach ($nnn_type as $item)
                <option value="{{$item->id}}" @if ($item->id == old('nnn_id'))
                    selected
                    @endif>{{$item->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="form-row mb-2" data-validate="Select a NN Type">
            <label for="nn_id" class="labelinput">NN Type</label>
            <select class="browser-default custom-select input_section selet validate_this" id="nn_id" name="nn_id"
                onchange="getWard(this,'{{route('getWard')}}','ward_id','');">
                <option value="" selected>Select NNN type first</option>
            </select>
        </div>
        <div class="form-row mb-2" data-validate="Select a Ward">
            <label for="ward_id" class="labelinput">Ward</label>
            <select class="browser-default custom-select input_section selet validate_this" id="ward_id" name="ward_id">
                <option value="" selected>Select NN type first</option>
            </select>
        </div>
        {{-- <div class="row mx-0">
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Ward no required">
                    <label for="ward_no" class="labelinput">Ward No.</label>
                    <input type="text" id="ward_no" name="ward_no" value="{{old('ward_no')}}"
        class="input_section validate_this only-num form-control mb-0" />
</div>
</div>
<div class="width-50">
    <div class="form-row mb-4" data-validate="Ward name required">
        <label for="ward_name" class="labelinput">Ward Name</label>
        <input type="text" id="ward_name" name="ward_name" value="{{old('ward_name')}}"
            class="input_section validate_this form-control mb-0" />
    </div>
</div>
</div> --}}
<input type="hidden" name="id" value="">
<div class="submitbtn">
    <button class="submitbutton btn btn-dark btn-block submit_button" data-id="parshadCreate" type="submit">
        Save
    </button>
</div>

<!-- Terms of service -->
</form>

<!-- Default form register -->
</div>
<script>
    @if ($errors->any() || session()->has('error'))
    $(document).ready(function(){
        getCity($('#state'),'{{route('getCity')}}','city','{{old('city')}}');
        setTimeout(() => {
            getNN($(`#nnn_id`),'{{route('getNN')}}','nn_id','nnn_id','city','{{old('nn_id')}}');
        }, 1000);
        setTimeout(() => {
            getWard($(`#nn_id`),'{{route('getWard')}}','ward_id','{{old('ward_id')}}');
        }, 3000);
    });
    @endif
</script>
@stop
