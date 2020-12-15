@extends('master')
@section('title','Voter List')
@section('content')

<style>
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
.modal-window:target {
  visibility: visible;
  opacity: 1;
  pointer-events: auto;
}
.modal-window > div {
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
.footerbtn
{
    padding: 30px 2px 0px;
    float: right;
}
</style>
<div class="maininnersection px-2 position-relative">



    <label for="ward_no" class="labelinput">Ward No - <span
            class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label>

    <form method="get" action="{{route('report.voterlist')}}">
        <div class="w-100 mb-2 row mx-0">
            <div class="width-50">
                <select class="form-control selectinput" name="part_id" onchange="this.form.submit()">
                    <option value="">Select Part No </option>
                    @if (count($parts))
                    @foreach ($parts as $item)
                    <option value="{{$item->id}}" @if (isset($part_id)) @if ($part_id==$item->id) selected @endif
                        @endif>{{$item->part_no}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="width-50">
                <select class="form-control selectinput" name="color" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="green" @if (isset($color)) @if ($color=='green' ) selected @endif @endif>Green
                    <option value="blue" @if (isset($color)) @if ($color=='blue' ) selected @endif @endif>Yellow
                    <option value="red" @if (isset($color)) @if ($color=='red' ) selected @endif @endif>Red
                    </option>
                </select>
            </div>
        </div>
    </form>
    <div class="row mx-0">
        @if(count($eroDataWithC))
        @foreach ($eroDataWithC as $item)
        <div class="width-33">
            <div class="listimg">
                <img src="{{$item->url}}" class="w-100 h-100" />
                @if ($item->color == 'green')
                <div class="green_box"></div>
                @elseif ($item->color == 'blue')
                <div class="yellow_box"></div>
                @elseif ($item->color == 'red')
                <div class="red_box"></div>
                @else
                @endif
            </div>
        </div>
        @endforeach
        @elseif(count($eroDataWithoutC))
        @foreach ($eroDataWithoutC as $item)
        <?php
$colorGet = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ero_id' => $item->id])->first();
?>
        <div class="width-33">
            <div class="listimg">
                <img src="{{$item->url}}" class="w-100 h-100" />
                @if ($colorGet == 'green')
                <div class="green_box"></div>
                @elseif ($colorGet == 'blue')
                <div class="yellow_box"></div>
                @elseif ($colorGet == 'red')
                <div class="red_box"></div>
                @else
                 <a class="red_box" href="#open-modal"></a>
                @endif
            </div>
        </div>
        @endforeach
        @else
        <h4>No data available</h4>
        @endif
    </div>


<div id="open-modal" class="modal-window">
  <div>
    <a href="#" title="Close" class="modal-close">x</a>
<h1 class="titlemodel">Choose Color </h1>
    <div class="row mb-2 d-inline mx-0">


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
          <div class="footerbtn">

           <button class="savebtn">OK</button>
    <button class="cancel">Cancel</button>
          </div>


        </div>


    </div>

</div>

</div>

@endsection
