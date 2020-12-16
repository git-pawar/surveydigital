@extends('master')
@section('title','Short Survey')
@section('content')

<style>
    .border_box {
        background: #ccc !important;
        height: 27px;
        width: 25px;
        position: absolute;
        top: 10px;
        right: 4px;
    }

    .modal-window {
        position: fixed;
        background-color: rgb(9 33 82 / 39%);
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 999;
        visibility: hidden;
        opacity: 0;
        pointer-events: none;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }

    .modal-window-open {
        visibility: visible;
        opacity: 1;
        pointer-events: auto;
    }

    .modal-window>div {
        width: 300px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        padding: 14px 12px;
        background: #ffffff;
    }

    .titlemodel {
        font-size: 13px !important;

        border-bottom: 1px solid #CCC;
        padding: 0px 0px 9px;
        color: #3e3e3e;
        font-weight: 500;
    }

    .modal-window header {
        font-weight: bold;
    }

    .modal-window h1 {
        font-size: 150%;
        margin: 0 0 15px;
    }

    .modal-close {
        color: #aaa;
        line-height: 25px;
        font-size: 17px;
        position: absolute;
        right: 0;
        text-align: center;
        top: -16px;
        width: 20px;
        border-radius: 3px;
        text-decoration: none;
        background: #003165
    }

    .modal-close:hover {
        color: black;
    }

    /* Demo Styles */



    .modal-window div:not(:last-of-type) {
        margin-bottom: 15px;
    }

    small {
        color: #aaa;
    }

    .btn {
        background-color: #fff;
        padding: 1em 1.5em;
        border-radius: 3px;
        text-decoration: none;
    }

    .btn i {
        padding-right: 0.3em;
    }

    .cancel {
        color: white;
        background: #9a0000;
        border: 1px solid #9a0000;
        font-size: 12px;
        padding: 2px 7px;
        border-radius: 3px;
    }

    .savebtn {
        color: white;
        background: #003165;
        border: 1px solid #003165;
        font-size: 12px;
        padding: 2px 7px;
        border-radius: 3px;
    }

    .footerbtn {
        padding: 30px 2px 0px;
        float: right;
    }
</style>
<div class="maininnersection px-2 position-relative">
    <div class="width-60 mb-2">
        <label for="ward_no" class="labelinput">Ward No -<span
                class="mx-1">{{$user->parshads->wards->ward_no??''}}</span></label>
        <span class="mx-1">,</span>
        <label for="part_no" class="labelinput">Part No -<span
                class="mx-1">{{$user->part_nos->part_no??''}}</span></label>
    </div>
    <div id="refreshList">
        <div class="row mx-0">
            @if(count($eroDataWithoutC))
            @foreach ($eroDataWithoutC as $item)
            <?php
                $colorGet = App\Models\SurveyData::where(['parshad_id' => $user->parshad_id, 'ero_id' => $item->id])->first();
            ?>

            <div class="width-33">
                <div class="listimg">
                    <img src="{{$item->url}}" class="w-100 h-100" />
                    @if (isset($colorGet) && $colorGet->red_green_blue == 'green')
                    <div class="green_box" onclick="toggleColorModal(this);" data-wardid="{{$item->ward_id}}"
                        data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}"
                        data-url="{{route('survey.data.short.store')}}" data-color="green"></div>
                    @elseif (isset($colorGet) && $colorGet->red_green_blue == 'blue')
                    <div class="yellow_box" onclick="toggleColorModal(this);" data-wardid="{{$item->ward_id}}"
                        data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}"
                        data-url="{{route('survey.data.short.store')}}" data-color="blue"></div>
                    @elseif (isset($colorGet) && $colorGet->red_green_blue == 'red')
                    <div class="red_box" onclick="toggleColorModal(this);" data-wardid="{{$item->ward_id}}"
                        data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}"
                        data-url="{{route('survey.data.short.store')}}" data-color="red"></div>
                    @else
                    <a class="border_box" href="javascript:void(0);" onclick="toggleColorModal(this);"
                        data-wardid="{{$item->ward_id}}" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-url="{{route('parshad.update.color')}}" data-color="grey"></a>
                    @endif
                </div>
            </div>
            @endforeach
            @else
            <h4>No data available</h4>
            @endif
        </div>
    </div>

    <div id="open-modal" class="modal-window">
        <div>
            <a href="#" title="Close" class="modal-close" onclick="toggleColorModal(this)">x</a>
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
            <h1 class="titlemodel">Choose Color </h1>
            <div class="row mb-2 d-inline mx-0">
                <input type="hidden" id="ward_id" value="" />
                <input type="hidden" id="part_id" value="" />
                <input type="hidden" id="s_no" value="" />
                <input type="hidden" id="current_color" value="" />
                {{-- <input type="hidden" id="parshadid" value="" /> --}}
                {{-- <input type="hidden" id="url_this" value="" /> --}}
                <label class="container_radio_button">
                    <span class="greenbox"></span>
                    <input type="radio" id="green" class="checkedColor" name="red_green_blue" value="green">
                    <span class="checkmarkgreen checkmark"></span>
                </label>

                <label class="container_radio_button">
                    <span class="yellowbox"></span>
                    <input type="radio" id="blue" class="checkedColor" name="red_green_blue" value="blue">
                    <span class="checkmark"></span>
                </label>
                <label class="container_radio_button">
                    <span class="redbox"></span>
                    <input type="radio" id="red" class="checkedColor" name="red_green_blue" value="red">
                    <span class="checkmarkred  checkmark"></span>
                </label>
                <div class="footerbtn">

                    <button class="savebtn" onclick="storeShortSurvey(this);">Save</button>
                    <button class="cancel" onclick="toggleColorModal(this);">Cancel</button>
                </div>


            </div>


        </div>

    </div>

</div>
<script>
    function toggleColorModal(dis) {

    if ($(`.modal-window`).hasClass("modal-window-open")) {
        $(`.modal-window`).removeClass('modal-window-open');
    } else {
        let wardid = $(dis).data('wardid'),
            partid = $(dis).data('partid'),
            sno = $(dis).data('sno'),
            parshad = $(dis).data('parshad'),
            url = $(dis).data('url'),
            color = $(dis).data('color');
        $(`.modal-window`).addClass('modal-window-open');
        $(`#ward_id`).val(wardid);
        $(`#part_id`).val(partid);
        $(`#s_no`).val(sno);
        // $(`#parshadid`).val(parshad);
        $(`#current_color`).val(color);
        // $(`#url_this`).val(url);
        $(`#${color}`).prop('checked', true);

    }
}
function storeShortSurvey(dis) {
    let color = '';
    const ward_id = $(`#ward_id`).val(),
        part_id = $(`#part_id`).val(),
        category = $(`#category`).val(),
        s_no = $(`#s_no`).val();
    $(`.checkedColor`).each(function() {
        if ($(this).is(':checked')) {
            color = $(this).val();
        }
    });
    if(!category){
        $(`#category`).css('border','1px solid red');
    }else{
        $(`#category`).css('border','1px solid #ccc');
    }
    $.ajax({
        url: '{{route('survey.data.short.store')}}',
        type: 'get',
        data: {
            color,
            ward_id,
            part_id,
            s_no,
            category
        },
        beforeSend: function() {

        },
        success: function(response) {
            if (response.success === true) {
                // $(`#refreshList`).load(window.location.href + " #refreshList");
                toggleColorModal(dis);
                Notiflix.Notify.Success(response.message);
            } else {
                Notiflix.Notify.Failure(response.message);
            }
        },
        error: function(xhr) {
            Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
        }
    });
}
</script>
@endsection
