@extends('master')
@section('title','Servey Data Entry')
@section('content')
<style>
    .container_radio_button {
        display: block;
        position: relative;
        padding-left: 31px;
        margin-bottom: 8px;
        cursor: pointer;
        font-size: 14px;
        text-align: left;
        display: inherit;
        font-weight: 600;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        margin-right: 22px;
        margin-top: 17px;
    }

    /* Hide the browser's default radio button */
    .container_radio_button input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container_radio_button:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container_radio_button input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* When the radio button is checked, add a blue background */
    .container_radio_button input:checked~.checkmark {
        background-color: #ffb734;
    }

    .container_radio_button input:checked~.checkmarkgreen {
        background-color: #027904 !important;
    }

    .container_radio_button input:checked~.checkmarkred {
        background-color: #79041c !important;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container_radio_button input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container_radio_button .checkmark:after {
        top: 5px;
        left: 5px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    .width-60 {
        width: 55%;
    }

    .width-45 {
        width: 45%;
    }

    .sticky {
        position: sticky;
        top: 0;
        background-color: white;
        /* padding: 50px; */
        font-size: 20px;
        /* border: 2px dashed #ccc; */
        /* padding: 7px 7px; */
    }

    .imagesection {
        height: 140px;
        width: 100%;
    }

    .z-depth-1 {
        -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
    }

    .greenbox {
        height: 10px;
        width: 10px;
        background: #358404;
        padding: 2px 17px;
    }

    .redbox {
        height: 10px;
        width: 10px;
        background: #921400;
        padding: 2px 17px;
    }

    .yellowbox {
        height: 10px;
        width: 10px;
        background: #fb3;
        padding: 2px 17px;
    }
</style>
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="surveyData" action="{{route('survey.data.store')}}" method="POST">
        @csrf
        <div class="row mx-0">

            <div class="width-60 mb-2">
                <label for="ward_no" class="labelinput">Ward No -<span
                        class="mx-1">{{$user->parshads->wards->ward_no??''}}</span></label>
                <span class="mx-1">,</span>
                <label for="part_no" class="labelinput">Part No -<span
                        class="mx-1">{{$user->part_nos->part_no??''}}</span></label>
            </div>
            <div class="width-45">

            </div>
        </div>
        <div class="sticky z-depth-1">
            <div class="imagesection" id="imagesection">
                <img class="w-100" id="imgPreview" src="img/dataimg.jpeg" />
            </div>

        </div>

        <div class="row mx-0">
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Ward No required">


                    <!-- <input type="text" id="ward_no" value="{{$user->parshads->wards->ward_no??''}}"
                        @if(isset($user->parshads->wards->ward_no)) readonly
                    @endif name="ward_no"
                    class="input_section form-control mb-0 only-num validate_this" /> -->
                    <input type="hidden" name="ward_id" value="{{$user->parshads->ward_id}}" />
                    <input type="hidden" name="ero_id" value="" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Part No required">

                    <!-- <input type="text" id="part_no" name="part_no" value="{{$user->part_nos->part_no??''}}"
                        @if(isset($user->part_nos->part_no)) readonly
                    @endif
                    class="input_section form-control mb-0 only-num validate_this" /> -->
                    <input type="hidden" name="part_id" value="{{$user->part_id}}" />
                </div>
            </div>
            <input type="hidden" id="minNo" value="{{$user->s_no_from}}">
            <input type="hidden" id="maxNo" value="{{$user->s_no_to}}">
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Section No required">
                    <label for="s_no" class="labelinput">Serial no</label>
                    <input type="text" id="s_no" value="{{old('s_no')}}" name="s_no"
                        class="input_section form-control mb-0 only-num validate_this getImage"
                        data-url="{{route('survey.image.get')}}" data-previw="imagesection" data-ero="ero_id"
                        data-ward="{{$user->parshads->ward_id}}" data-part="{{$user->part_id}}" data-min="minNo"
                        data-max="maxNo" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="House No required">
                    <label for="house_no" class="labelinput">House no</label>
                    <input type="text" id="house_no" value="{{old('house_no')}}" name="house_no"
                        class="input_section form-control mb-0 validate_this" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Cast required">
                    <label for="cast" class="labelinput">Cast</label>
                    <input type="text" id="cast" value="{{old('cast')}}" name="cast"
                        class="input_section form-control mb-0 validate_this" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Select any one category">
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
                <div class="form-row mb-2" data-validate="Name required">
                    <label for="name" class="labelinput">Name</label>
                    <input type="text" id="name" value="{{old('name')}}" name="name"
                        class="validate_this input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Mobile No required">
                    <label for="mobile" class="labelinput">Mobile No. </label>
                    <input type="text" id="mobile" value="{{old('mobile')}}" name="mobile"
                        class="input_section form-control mb-0 only-num validate_this" data-len="10" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Voter Count required">
                    <label for="voter_count" class="labelinput">Voter Count </label>
                    <input type="text" id="voter_count" name="voter_count" value="{{old('voter_count')}}"
                        class="input_section form-control mb-0 only-num" data-len="2" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2">
                    <button type="button" id="btn" class="input_section btn btncom btn-sm w-100"
                        style="margin-top: 20px;" onclick="generateRows(this)"><i
                            class="fas fa-plus mx-2"></i>Generate</button>
                </div>
            </div>


        </div>
        <div class="row mx-0" id="otheMember">
            @if($errors-> any() ||session()-> has('error'))
            @if (count(old('otherSno')))
            @foreach (old('otherSno') as $index=> $item)
            <div class="width-50">
                <div class="form-row mb-2" data-validate=""><input type="text" name="otherSno[]"
                        value="{{old('otherSno')[$index]}}"
                        class="input_section form-control mb-0 otherSno validate_this only-num" placeholder="S.No" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Voter Count required"><input type="text" name="otherMobile[]"
                        value="{{old('otherMobile')[$index]}}"
                        class="input_section form-control mb-0 otherMobile only-num validate_this" data-len="10"
                        onkeydown="onlyNum(event,this,10,false);" placeholder="Mobile" /></div>
            </div>
            @endforeach

            @endif
            @endif
        </div>
        <div class="row mb-2 d-inline">


            <label class="container_radio_button">
                <span class="greenbox"></span>
                <input type="radio" checked="checked" name="red_green_blue" value="green">
                <span class="checkmarkgreen checkmark"></span>
            </label>


            <label class="container_radio_button">
                <span class="yellowbox"></span>
                <input type="radio" name="red_green_blue" value="blue">
                <span class="checkmark"></span>
            </label>
            <label class="container_radio_button">
                <span class="redbox"></span>
                <input type="radio" name="red_green_blue" value="red">
                <span class="checkmarkred  checkmark"></span>
            </label>

        </div>
        <input type="hidden" name="id" value="">
        <div class="submitbtn">
            <button class="submitbutton btn btnblue btn-block submit_button" data-id="surveyData" type="submit">
                <i class="fas fa-save mr-1"></i> Save
            </button>
        </div>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
<script>
    @if($errors-> any() ||session()-> has('error'))
        getImage($(`#s_no`), '{{route('survey.image.get')}}', 'imagesection', '{{$user->parshads->ward_id}}', '{{$user->part_id}}');
    @endif
    function generateRows(dis) {
    let count = $(`.even`).length + 1,
        voter_count = $(`#voter_count`).val(),
        elm = '',
        otherSno = [],
        otherMobile = [];
    $(`.otherSno`).each(function() {
        otherSno.push($(this).val());
    });
    $(`.otherMobile`).each(function() {
        otherMobile.push($(this).val());
    });
    $(`#otheMember`).html('');
    $(`#otheMember`).append(
        // '<div class="width-50"><div class="form-row mb-4"><label for="other" class="labelinput">Other Names</label></div></div><div class="width-50"><div class="form-row mb-4"><label for="" class="labelinput">Mobile</label></div></div>'
    );
    elm = `<div class="width-50"><div class="form-row mb-2" data-validate=""><input type="text" name="otherSno[]" value="{{old('')}}"
                    class="input_section form-control mb-0 otherName validate_this" placeholder="S.No"/></div></div><div class="width-50"><div class="form-row mb-4" data-validate="Voter Count required"><input type="text" name="otherMobile" value="{{old('')}}"
                    class="input_section form-control mb-0 otherMobile only-num validate_this" data-len="10"
                    placeholder="Mobile"/></div></div>`;
    for (i = 0; i < voter_count; i++) {

        $(`#otheMember`).append(`<div class="width-50"><div class="form-row mb-2" data-validate=""><input type="text" name="otherSno[]" value="${otherSno[i]?otherSno[i]:''}"
                    class="input_section form-control mb-0 otherSno validate_this only-num" placeholder="S.No"/></div></div><div class="width-50"><div class="form-row mb-2" data-validate="Voter Count required"><input type="text" name="otherMobile[]" value="${otherMobile[i]?otherMobile[i]:''}"
                    class="input_section form-control mb-0 otherMobile only-num validate_this" data-len="10" onkeydown="onlyNum(event,this,10,false);"
                    placeholder="Mobile"/></div></div>`);
    }
    // console.log(otherName, otherMobile);
}
</script>
@stop
