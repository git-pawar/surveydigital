@extends('master')
@section('title','Part wise report')
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
<div class="maininnersection">
    <div class="">
        <!-- <label for="ward_no" class="labelinput">Ward No - <span
                class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label> -->

        <form method="get" action="{{route('report.typewise',['type'=>'partwise'])}}" id="searchData">
            <div class="row mx-0 mb-2">
                <div class="width-50">
                    <select class="form-control selectinput mb-1" name="partno" onchange="this.form.submit()">
                        <option value="">Select Part No </option>
                        @if (count($parts))
                        @foreach ($parts as $item)
                        <option value="{{$item->id}}" @if (isset($partno)) @if ($partno==$item->id) selected @endif
                            @endif>{{$item->part_no}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="width-50">
                    <select class="form-control selectinput " name="filterBy" onchange="filterIt(this);">
                        <option value="">Filter By </option>
                        <option value="Name" @if (isset($filterBy)) @if ($filterBy=='Name' ) selected @endif @endif>Name
                        </option>
                        <option value="House" @if (isset($filterBy)) @if ($filterBy=='House' ) selected @endif @endif>
                            House No
                        </option>
                        <option value="Category" @if (isset($filterBy)) @if ($filterBy=='Category' ) selected @endif
                            @endif>
                            Category</option>
                        <option value="Color" @if (isset($filterBy)) @if ($filterBy=='Color' ) selected @endif @endif>
                            Color
                        </option>
                        <option value="Mobile" @if (isset($filterBy)) @if ($filterBy=='Mobile' ) selected @endif @endif>
                            Mobile
                            No
                        </option>

                    </select>
                </div>

            </div>
            <div class="w-100" id="inputSearch" @if ($filterBy=='Name' || $filterBy=='House' ||$filterBy=='Mobile' )
                style="display: block;" @else style="display: none;" @endif>
                <div class="w-100 row mx-0 mt-2 padding_10">
                    <div class="width-80">
                        <div class="form-row mb-2" data-validate="Name required">

                            <input type="search" id="" value="{{isset($inputSearch)?$inputSearch:''}}"
                                placeholder="Search name, house, mobile" name="inputSearch"
                                class="partwise form-control mb-0 validate_this">
                        </div>
                    </div>
                    <div class="width-20 py-0 margin-1">
                        <button type="submit" class="btn_search" data-id="searchData"><i
                                class="fas fa-search"></i></button>
                    </div>

                </div>
            </div>

            <div id="categorySearch" @if ($filterBy=='Category' ) style="display: block;" @else style="display: none;"
                @endif>
                <div class="w-100 row mx-0 mt-2">
                    <div class="width-80">
                        <select class="form-control selectinput validate_this" name="categorySearch">
                            <option value="">All</option>
                            <option value="General" @if (isset($categorySearch)) @if ($categorySearch=='General' )
                                selected @endif @endif>
                                General
                            </option>
                            <option value="OBC" @if (isset($categorySearch)) @if ($categorySearch=='OBC' ) selected
                                @endif @endif>OBC
                            </option>
                            <option value="ST" @if (isset($categorySearch)) @if ($categorySearch=='ST' ) selected @endif
                                @endif>ST
                            </option>
                            <option value="SC" @if (isset($categorySearch)) @if ($categorySearch=='SC' ) selected @endif
                                @endif>SC
                            </option>
                            <option value="Minority" @if (isset($categorySearch)) @if ($categorySearch=='Minority' )
                                selected @endif @endif>
                                Minority
                            </option>
                        </select>
                    </div>
                    <div class="width-20 py-0 m-t-5">
                        <button type="submit" class="btn_search" data-id="searchData"><i
                                class="fas fa-search"></i></button>
                    </div>

                </div>
            </div>

            <div id="colorSearch" @if ($filterBy=='Color' ) style="display: block;" @else style="display: none;" @endif>
                <div class="w-100 row mx-0 mt-2">
                    <div class="width-80">
                        <select class="form-control selectinput validate_this" name="colorSearch">
                            <option value="">All</option>
                            <option value="green" @if (isset($colorSearch)) @if ($colorSearch=='green' ) selected @endif
                                @endif>
                                Green
                            <option value="blue" @if (isset($colorSearch)) @if ($colorSearch=='blue' ) selected @endif
                                @endif>Yellow
                            <option value="red" @if (isset($colorSearch)) @if ($colorSearch=='red' ) selected @endif
                                @endif>
                                Red
                            </option>
                        </select>
                    </div>
                    <div class="width-20 py-0 m-t-5">
                        <button type="submit" class="btn_search" data-id="searchData"><i
                                class="fas fa-search"></i></button>
                    </div>

                </div>
            </div>

        </form>
    </div>
    <div class="table-responsive" id="refreshList">
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>S.no</th> --}}
                    {{-- <th>Ward No</th> --}}
                    <th>Part no</th>
                    <th>Name</th>
                    <th class="">S.No.</th>
                    <th class="">House No </th>
                    <th>Cast </th>
                    <th>Category </th>
                    <th>Colour Search </th>
                    <th>Family Member Count</th>
                    <th>Mobile Number</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                @if (count($surveyData))
                @foreach ($surveyData as $index => $item)
                <tr>
                    {{-- <td class="text-center">{{str_pad($index+1,2,0,STR_PAD_LEFT)}}</td> --}}
                    {{-- <td class="text-center">1</td> --}}
                    <td class="text-center">{{str_pad($item->part_nos->part_no,2,0,STR_PAD_LEFT)??''}}</td>
                    <td class="text-center">{{$item->name??'N/A'}}</td>
                    <td class="text-center">{{str_pad($item->s_no,2,0,STR_PAD_LEFT)??''}}</td>
                    <td class="text-center">{{$item->house_no??''}}</td>
                    <td class="text-center">{{$item->cast??''}}</td>
                    <td class="text-center">{{$item->category??''}}</td>
                    <td class="text-center">@if ($item->red_green_blue == 'green')
                        <div class="" style="width:30px; height:15px; background-color:green"
                            onclick="toggleColorModal(this);" data-wardid="{{$item->ward_id}}"
                            data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}"
                            data-url="{{route('parshad.update.color')}}" data-color="green"></div>
                        @elseif($item->red_green_blue == 'blue')
                        <div class="" style="width:30px; height:15px; background-color:yellow"
                            onclick="toggleColorModal(this);" data-wardid="{{$item->ward_id}}"
                            data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}"
                            data-url="{{route('parshad.update.color')}}" data-color="blue"></div>
                        @elseif($item->red_green_blue == 'red')
                        <div class="" style="width:30px; height:15px; background-color:red"
                            onclick="toggleColorModal(this);" data-wardid="{{$item->ward_id}}"
                            data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}"
                            data-url="{{route('parshad.update.color')}}" data-color="red"></div>
                        @endif</td>
                    <td class="text-center">{{str_pad($item->voter_count,2,0,STR_PAD_LEFT)??0}}</td>
                    <td class="text-center">
                        @if(isset($item->mobile))
                        <a href="tel:{{$item->mobile??''}}">{{$item->mobile??'N/A'}}</a>
                        @endif
                    </td>
                    <td class="text-center">{{$item->remark??'N/A'}}</td>
                </tr>
                @endforeach
                @else
                <td class="text-center" colspan="10">No data</td>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div id="open-modal" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close" onclick="toggleColorModal(this)">x</a>
        <h1 class="titlemodel">Choose Color </h1>
        <div class="row mb-2 d-inline mx-0">
            <input type="hidden" id="wardid" value="" />
            <input type="hidden" id="partid" value="" />
            <input type="hidden" id="sno" value="" />
            <input type="hidden" id="parshadid" value="" />
            <input type="hidden" id="current_color" value="" />
            <input type="hidden" id="url_this" value="" />
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

                <button class="savebtn" onclick="updateColor(this);">OK</button>
                <button class="cancel" onclick="toggleColorModal(this);">Cancel</button>
            </div>


        </div>


    </div>

</div>
<script type="text/javascript">
    function filterIt(dis){
        let disVal = $(dis).val();
        if(disVal == 'Name' ||disVal == 'House' ||disVal == 'Mobile'){
            $(`#inputSearch`).css('display','block');
            $(`#categorySearch`).css('display','none');
            $(`#colorSearch`).css('display','none');
        }else if(disVal == 'Category'){
            $(`#categorySearch`).css('display','block');
            $(`#inputSearch`).css('display','none');
            $(`#colorSearch`).css('display','none');
        }else if(disVal == 'Color'){
            $(`#colorSearch`).css('display','block');
            $(`#inputSearch`).css('display','none');
            $(`#categorySearch`).css('display','none');
        }
    }

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
