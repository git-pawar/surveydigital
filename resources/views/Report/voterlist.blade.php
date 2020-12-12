@extends('master')
@section('title','Voter List')
@section('content')

<style>

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
            $colorGet = App\Models\SurveyData::where(['parshad_id'=>$user->id,'ero_id'=>$item->id])->first();
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
                @endif
            </div>
        </div>
        @endforeach
        @else
        <h4>No data available</h4>
        @endif
    </div>
</div>

@endsection
