@extends('master')
@section('title','Edit Survey User')
@section('content')
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="surveyorStore" action="{{route('parshad.store.surveyor')}}" method="POST">
        @csrf
        <p class="titlesection">Edit Survey User</p>

        <div class="form-row mb-2" data-validate="Name is required">
            <label for="name" class="labelinput">Name</label>
            <input type="text" id="name" name="name" value="{{$editSurveyor->name}}"
                class="input_section form-control mb-0 validate_this" />
        </div>

        <div class="form-row mb-2" data-validate="Mobile no is not valid">
            <label for="mobile" class="labelinput">Mobile</label>
            <input type="text" id="mobile" name="mobile" value="{{$editSurveyor->mobile}}"
                class="input_section form-control mb-0 validate_this only-num" data-len="10" />
        </div>
        <div class="form-row mb-2" data-validate="Password is required">
            <label for="password" class="labelinput">Password</label>
            <input type="text" id="password" name="password" value="{{$editSurveyor->password2}}"
                class="input_section form-control mb-0 validate_this " />
        </div>
        <div class="form-row mb-2" data-validate="Bhag Kramank / Part is required">
            <label for="part_no" class="labelinput">Bhag Kramank / Part.</label>
            <input type="text" id="part_no" name="part_no" value="{{$editSurveyor->part_no}}"
                class="input_section form-control mb-0 validate_this" />
        </div>
        <div class="form-row mb-2" data-validate="Section is required">
            <label for="section" class="labelinput">Section</label>
            <select class="browser-default custom-select input_section selet validate_this" id="section" name="section">
                <option value="" selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="row mx-0">
            <div class="width-50">
                <div class="form-row mb-4" data-validate="S.no.from is required">
                    <label for="s_no_from" class="labelinput">S.no.from</label>
                    <input type="text" id="s_no_from" name="s_no_from" value="{{$editSurveyor->s_no_from}}"
                        class="input_section form-control mb-0 validate_this only-num" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="S.no.to is required">
                    <label for="s_no_to" class="labelinput">S.no.to</label>
                    <input type="text" id="s_no_to" name="s_no_to" value="{{$editSurveyor->s_no_to}}"
                        class="input_section form-control mb-0 validate_this only-num" />
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$editSurveyor->id}}">
        <div class="submitbtn">
            <button class="submitbutton btn btn-dark btn-block submit_button" data-id="surveyorStore" type="submit">
                Update
            </button>
            <a class="submitbutton btn btn-danger btn-block" href="{{route('parshad.list.surveyor')}}">
                Cancel
            </a>
        </div>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@stop
