@extends('master')
@section('title','Voter List')
@section('content')

<style>
    .border_box {
        background: #ccc !important;
        height: 20px;
        width: 20px;
        position: absolute;
        top: 4px;
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

    .downloadReport {
        padding: 3px 20px !important;
        margin-top: -3px !important;
        /* margin-left: 20px !important; */
    }
    .width-10{
        width: 10%;
    }
</style>
<div class="maininnersection px-2 position-relative">
    <label for="ward_no" class="labelinput">Ward No - <span
            class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label>
    <form method="post" action="{{route('admin.report.voterlist')}}" id="downloadPdf">
    @csrf
        <div class="w-100 mb-2 row mx-0">
            <div class="width-10 mx-2">
                <select class="form-control selectinput" name="part_id" required>
                    @if (count($parts))
                    @foreach ($parts as $item)
                    <option value="{{$item->id}}" @if (isset($part_id)) @if ($part_id==$item->id) selected @endif
                        @endif>{{$item->part_no}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="width-10 mx-2">
                <select class="form-control selectinput" name="color" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="green" @if (isset($color)) @if ($color=='green' ) selected @endif @endif>Green
                    <option value="blue" @if (isset($color)) @if ($color=='blue' ) selected @endif @endif>Yellow
                    <option value="red" @if (isset($color)) @if ($color=='red' ) selected @endif @endif>Red
                    </option>
                </select>
            </div>
            <div class="width-10">
                <input type="hidden" value="{{base64_encode($user->id)}}" name="parshad_id" />
                <button class="downloadReport btn btn-dark btn-block submit_button" data-id="downloadPdf" type="submit">
                    Download
                </button>
            </div>
        </div>

    </form>

    <label for="ward_no" class="labelinput">Ward No - <span
            class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label>
    <form method="post" action="{{route('admin.report.voterlist')}}" id="downloadPdf">
    @csrf
        <div class="w-100 mb-2 row mx-0">
            <div class="width-10 mx-2">
                <select class="form-control selectinput" name="part_id" required>
                    @if (count($parts))
                    @foreach ($parts as $item)
                    <option value="{{$item->id}}" @if (isset($part_id)) @if ($part_id==$item->id) selected @endif
                        @endif>{{$item->part_no}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="width-10 mx-2">
                <select class="form-control selectinput" name="color" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="green" @if (isset($color)) @if ($color=='green' ) selected @endif @endif>Green
                    <option value="blue" @if (isset($color)) @if ($color=='blue' ) selected @endif @endif>Yellow
                    <option value="red" @if (isset($color)) @if ($color=='red' ) selected @endif @endif>Red
                    </option>
                </select>
            </div>
            <div class="width-10">
                <input type="hidden" value="{{base64_encode($user->id)}}" name="parshad_id" />
                <button class="downloadReport btn btn-dark btn-block submit_button" data-id="downloadPdf" type="submit">
                    Download
                </button>
            </div>
        </div>

    </form>


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
        $(`#wardid`).val(wardid);
        $(`#partid`).val(partid);
        $(`#sno`).val(sno);
        $(`#parshadid`).val(parshad);
        $(`#current_color`).val(color);
        $(`#url_this`).val(url);
        $(`#${color}`).prop('checked', true);

    }
}
</script>
@endsection
