@extends('master')
@section('title','Servey User Login')
@section('content')
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        <p class="titlesection">Survey Data</p>

        <div class="row mx-0">
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="ward" class="labelinput">Ward No</label>
                    <input type="number" id="ward" class="input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="part" class="labelinput">Part No</label>
                    <input type="number" id="st" class="input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="sno" class="labelinput">S.no</label>
                    <input type="number" id="sno" class="input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="house" class="labelinput">House no</label>
                    <input type="number" id="house" class="input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="surname" class="labelinput">Surname</label>
                    <input type="text" id="Surname" class="input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="house" class="labelinput">Cast</label>
                    <input type="text" id="house" class="input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="house" class="labelinput">Voter Count </label>
                    <input type="number" id="house" class="input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="house" class="labelinput">Mobile No. </label>
                    <input type="number" id="mobile" class="input_section form-control mb-0" />
                </div>
            </div>

        </div>

        <div class="form-row mb-4">


        </div>
        <div class="submitbtn">
            <button class="submitbutton btn btn-dark btn-block" type="submit">
                Save
            </button>
        </div>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@stop
