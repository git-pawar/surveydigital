@extends('master')
@section('title','Edit - '.$editParshad->name)
@section('content')
<div class="maininnersection">
    <form class="text-center" id="parshadCreate" action="{{route('admin.create.parshad.process')}}" method="post">
        @csrf
        <p class="titlesection">Create Parshad</p>

        <div class="form-row mb-2" data-validate="Name is required">
            <label for="name" class="labelinput">Name</label>
            <input type="text" id="name" name="name" value="{{$editParshad->name}}"
                class="input_section form-control mb-0 validate_this" />
        </div>

        <div class="form-row mb-2" data-validate="Mobile no is not valid">
            <label for="mobile" class="labelinput">Mobile</label>
            <input type="text" id="mobile" name="mobile" value="{{$editParshad->mobile}}"
                class="input_section form-control mb-0 validate_this only-num" data-len="10" />
        </div>
        <div class="form-row mb-2" data-validate="Email is not valid">
            <label for="email" class="labelinput">Email</label>
            <input type="text" id="email" name="email" value="{{$editParshad->email}}"
                class="input_section form-control mb-0 validate_this" />
        </div>
        <div class="form-row mb-2" data-validate="Password is required">
            <label for="password" class="labelinput">Password</label>
            <input type="text" id="password" name="password" value="{{$editParshad->password2}}"
                class="input_section form-control mb-0 validate_this " />
        </div>
        <div class="form-row mb-2" data-validate="Select a state">
            <label for="state" class="labelinput">State</label>
            <select class="browser-default custom-select input_section selet validate_this"
                onchange="getCity(this,'{{route('getCity')}}','city','');" id="state" name="state">
                <option selected>Select</option>
                @if(count($state))
                @foreach ($state as $item)
                <option value="{{$item->id}}" @if ($item->id == $editParshad->state)
                    selected
                    @endif>{{$item->state_name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="form-row mb-2" data-validate="Select a city">
            <label for="city" class="labelinput">City</label>
            <select class="browser-default custom-select input_section selet validate_this" id="city" name="city">
                <option selected>Select state first</option>
            </select>
        </div>
        <div class="row mx-0">
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Ward no required">
                    <label for="ward_no" class="labelinput">Ward No.</label>
                    <input type="text" id="ward_no" name="ward_no" value="{{$editParshad->ward_no}}"
                        class="input_section validate_this only-num form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Ward name required">
                    <label for="ward_name" class="labelinput">Ward Name</label>
                    <input type="text" id="ward_name" name="ward_name" value="{{$editParshad->ward_name}}"
                        class="input_section validate_this form-control mb-0" />
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$editParshad->id}}">
        <div class="submitbtn">
            <button class="submitbutton btn btn-dark btn-block submit_button" data-id="parshadCreate" type="submit">
                Update
            </button>
            <a class="submitbutton btn btn-danger btn-block" href="{{route('admin.list.parshad')}}">
                Cancel
            </a>
        </div>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
<script>
    $(document).ready(function(){
        getCity($('#state'),'{{route('getCity')}}','city','{{$editParshad->city}}');
    });

</script>
@stop
