@extends('master')
@section('title','Servey Data Entry')
@section('content')
<style>

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
            <div class="width-25">

                <div class="form-row mb-2" data-validate="Section No required">

                    <input type="number" id="s_no" value="{{old('s_no')}}" name="s_no"
                        class="h-25 form-control mb-0 only-num validate_this getImage "
                        data-url="{{route('survey.image.get')}}" data-previw="imagesection" data-ero="ero_id"
                        data-ward="{{$user->parshads->ward_id}}" data-part="{{$user->part_id}}" data-min="minNo"
                        data-max="maxNo" placeholder="s.no" />

                </div>
            </div>
        </div>
        <div class="sticky z-depth-1">
            <div class="imagesection" id="imagesection">
                <img class="w-100" id="imgPreview" src="{{url('img/dataimg.jpg')}}" />
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
                <div class="form-row mb-2" data-validate="House No required">
                    <label for="house_no" class="labelinput">House no</label>
                    <input type="text" id="house_no" value="{{old('house_no')}}" name="house_no"
                        class="input_section form-control mb-0 " />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Cast required">
                    <label for="cast" class="labelinput">Cast</label>
                    <input type="text" id="cast" value="{{old('cast')}}" name="cast"
                        class="input_section form-control mb-0 " />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Select any one category">
                    <label for="category" class="labelinput">Category</label>
                    <select class="input_section form-control mb-0 " name="category" id="category">
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
                        class=" input_section form-control mb-0" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Mobile No required">
                    <label for="mobile" class="labelinput">Mobile No. </label>
                    <input type="number" id="mobile" value="{{old('mobile')}}" name="mobile"
                        class="input_section form-control mb-0 only-num " data-len="10" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Remark is required">
                    <label for="remark" class="labelinput">Remark </label>
                    <input type="text" id="remark" value="{{old('remark')}}" name="remark"
                        class="input_section form-control mb-0 " />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Voter Count required">
                    <label for="voter_count" class="labelinput">Voter Count </label>
                    <input type="number" id="voter_count" name="voter_count" value="{{old('voter_count')??0}}"
                        class="input_section form-control mb-0 only-num " data-len="2" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2">
                    <button type="button" id="btn" class="input_section btn btncom btn-sm w-100 px-2"
                        style="margin-top: 20px;" onclick="generateRows(this)"><i
                            class="fas fa-plus mx-1"></i>Generate</button>
                </div>
            </div>


        </div>
        <div class="row mx-0" id="otheMember">
            @if($errors-> any() ||session()-> has('error'))
            @if (count(old('otherSno')))
            @foreach (old('otherSno') as $index=> $item)
            <div class="width-50">
                <div class="form-row mb-2" data-validate=""><input type="number" name="otherSno[]"
                        value="{{old('otherSno')[$index]}}"
                        class="input_section form-control mb-0 otherSno validate_this only-num" placeholder="S.No" />
                </div>
            </div>
            <div class="width-50">
                <div class="form-row mb-2" data-validate="Voter Count required"><input type="number"
                        name="otherMobile[]" value="{{old('otherMobile')[$index]}}"
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
                <input type="radio" class="color-checked" checked="checked" name="red_green_blue" value="green">
                <span class="checkmarkgreen checkmark"></span>
            </label>


            <label class="container_radio_button">
                <span class="yellowbox"></span>
                <input type="radio" class="color-checked" name="red_green_blue" value="blue">
                <span class="checkmark"></span>
            </label>
            <label class="container_radio_button">
                <span class="redbox"></span>
                <input type="radio" class="color-checked" name="red_green_blue" value="red">
                <span class="checkmarkred  checkmark"></span>
            </label>

        </div>
        <input type="hidden" name="id" value="">
        <div class="submitbtn">
            <button class="submitbutton btn btnblue btn-block survey_submit" data-id="surveyData" type="submit">
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

        $(`#otheMember`).append(`<div class="width-50"><div class="form-row mb-2" data-validate=""><input type="number" name="otherSno[]" value="${otherSno[i]?otherSno[i]:''}"
                    class="input_section form-control mb-0 otherSno validate_this only-num" placeholder="S.No"/></div></div><div class="width-50"><div class="form-row mb-2" data-validate="Voter Count required"><input type="number" name="otherMobile[]" value="${otherMobile[i]?otherMobile[i]:''}"
                    class="input_section form-control mb-0 otherMobile only-num validate_this" data-len="10" onkeydown="onlyNum(event,this,10,false);"
                    placeholder="Mobile"/></div></div>`);
    }
    // console.log(otherName, otherMobile);
}
</script>
@stop
