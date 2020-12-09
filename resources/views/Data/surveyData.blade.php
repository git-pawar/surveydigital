@extends('master')
@section('title','Servey Data Entry')
@section('content')
<style>
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="surveyData" action="{{route('survey.data.store')}}" method="POST">
        @csrf
        <p class="titlesection">Survey Data</p>

        <div class="row mx-0">
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Ward No required">
                    <label for="ward_no" class="labelinput">Ward No</label>
                    <input type="text" id="ward_no" value="{{$user->parshads->wards->ward_no??''}}"
                        @if(isset($user->parshads->wards->ward_no)) readonly
                    @endif name="ward_no"
                    class="input_section form-control mb-0 only-num validate_this" />
                    <input type="hidden" name="ward_id" value="{{$user->parshads->ward_id}}" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Part No required">
                    <label for="part_no" class="labelinput">Part No</label>
                    <input type="text" id="part_no" name="part_no" value="{{$user->part_nos->part_no??''}}"
                        @if(isset($user->part_nos->part_no)) readonly
                    @endif
                    class="input_section form-control mb-0 only-num validate_this" />
                    <input type="hidden" name="part_id" value="{{$user->part_id}}" />
                </div>
            </div>
            <input type="hidden" id="minNo" value="{{$user->s_no_from}}">
            <input type="hidden" id="maxNo" value="{{$user->s_no_to}}">
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Section No required">
                    <label for="s_no" class="labelinput">Serial no</label>
                    <input type="text" id="s_no" value="{{old('s_no')}}" name="s_no"
                        class="input_section form-control mb-0 only-num validate_this" data-min="minNo"
                        data-max="maxNo" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="House No required">
                    <label for="house_no" class="labelinput">House no</label>
                    <input type="text" id="house_no" value="{{old('house_no')}}" name="house_no"
                        class="input_section form-control mb-0 validate_this" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Cast required">
                    <label for="cast" class="labelinput">Cast</label>
                    <input type="text" id="cast" value="{{old('cast')}}" name="cast"
                        class="input_section form-control mb-0 validate_this" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Select any one category">
                    <label for="category" class="labelinput">Category</label>
                    <select class="input_section form-control mb-0 validate_this" name="category" id="category">
                        <option value="">Select</option>
                        <option value="General" @if(old('category')=='General' ) selected @endif>General</option>
                        <option value="OBC" @if(old('category')=='OBC' ) selected @endif>OBC</option>
                        <option value="ST" @if(old('category')=='ST' ) selected @endif>ST</option>
                        <option value="SC" @if(old('category')=='SC' ) selected @endif>SC</option>
                        <option value="Minority" @if(old('category')=='Minority' ) selected @endif>Minority</option>
                    </select>
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Name required">
                    <label for="name" class="labelinput">Name</label>
                    <input type="text" id="name" value="{{old('name')}}" name="name"
                        class="validate_this input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Mobile No required">
                    <label for="mobile" class="labelinput">Mobile No. </label>
                    <input type="text" id="mobile" value="{{old('mobile')}}" name="mobile"
                        class="input_section form-control mb-0 only-num validate_this" data-len="10" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4" data-validate="Voter Count required">
                    <label for="voter_count" class="labelinput">Voter Count </label>
                    <input type="text" id="voter_count" name="voter_count" value="{{old('voter_count')}}"
                        class="input_section form-control mb-0 only-num" data-len="2" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-4">
                    <label for="btn" class="labelinput">Generate </label>
                    <button type="button" id="btn" class="input_section btn btn-primary btn-sm w-50"
                        style="margin-top: 20px;" onclick="generateRows(this)"><i class="fas fa-plus"></i></button>
                </div>
            </div>


        </div>
        <div class="row mx-0" id="otheMember">
        </div>
        <div class="row mb-2 d-inline">
            <label class="container">Green
                <input type="radio" checked="checked" name="red_green_blue" value="green">
                <span class="checkmark"></span>
            </label>
            <label class="container">Blue
                <input type="radio" name="red_green_blue" value="blue">
                <span class="checkmark"></span>
            </label>
            <label class="container">Red
                <input type="radio" name="red_green_blue" value="red">
                <span class="checkmark"></span>
            </label>

        </div>
        <input type="hidden" name="id" value="">
        <div class="submitbtn">
            <button class="submitbutton btn btn-dark btn-block submit_button" data-id="surveyData" type="submit">
                Save
            </button>
        </div>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
<script>
    function generateRows(dis){
        let count = $(`.even`).length+1,
            voter_count = $(`#voter_count`).val(),
            elm = '',
            otherName =[], otherMobile = [];
            $(`.otherName`).each(function(){
                otherName.push($(this).val());
            });
            $(`.otherMobile`).each(function(){
                otherMobile.push($(this).val());
            });
            $(`#otheMember`).html('');
            $(`#otheMember`).append('<div class="width-50"><div class="form-row mb-4"><label for="other" class="labelinput">Other Names</label></div></div><div class="width-50"><div class="form-row mb-4"><label for="" class="labelinput">Mobile</label></div></div>');
            elm = `<div class="width-50"><div class="form-row mb-4" data-validate=""><input type="text" name="otherName[]" value="{{old('')}}"
                    class="input_section form-control mb-0 otherName validate_this" placeholder="Name"/></div></div><div class="width-50"><div class="form-row mb-4" data-validate="Voter Count required"><input type="text" name="otherMobile" value="{{old('')}}"
                    class="input_section form-control mb-0 otherMobile only-num validate_this" data-len="10"
                    placeholder="Mobile"/></div></div>`;
            for(i = 0; i<voter_count;i++){

                $(`#otheMember`).append(`<div class="width-50"><div class="form-row mb-4" data-validate=""><input type="text" name="otherName[]" value="${otherName[i]?otherName[i]:''}"
                    class="input_section form-control mb-0 otherName validate_this" placeholder="Name"/></div></div><div class="width-50"><div class="form-row mb-4" data-validate="Voter Count required"><input type="text" name="otherMobile[]" value="${otherMobile[i]?otherMobile[i]:''}"
                    class="input_section form-control mb-0 otherMobile only-num validate_this" data-len="10" onkeydown="onlyNum(event,this,10,false);"
                    placeholder="Mobile"/></div></div>`);
            }
            console.log(otherName,otherMobile);
    }
</script>
@stop
