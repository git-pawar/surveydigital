@extends('master')
@section('title','Polling Booth Voter List')
@section('content')

<style>

</style>
<div class="maininnersection px-2 position-relative">
    <div class="">
        <!-- <label for="ward_no" class="labelinput">Ward No - <span
                class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label> -->

        <form method="get" action="{{route('report.booth.voterlist')}}" id="searchData">
            <div class="row mx-0 mb-2">
                <div class="width-50">
                    <select class="form-control selectinput mb-1" name="part_id" onchange="this.form.submit()">
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
                    <select class="form-control selectinput " name="filterBy" onchange="this.form.submit()">
                        <option value="all" @if (isset($filterBy)) @if ($filterBy=='all' ) selected @endif @endif>
                            All</option>
                        <option value="done" @if (isset($filterBy)) @if ($filterBy=='done' ) selected @endif @endif>Done
                        </option>
                        <option value="pending" @if (isset($filterBy)) @if ($filterBy=='pending' ) selected @endif
                            @endif>
                            Pending
                        </option>
                    </select>
                </div>

            </div>

        </form>
    </div>
    <div id="refreshList">
        <div class="row mx-0">
            @if (count($boothDataAll))
            @foreach ($boothDataAll as $index => $item)
            <?php
            $boothData = App\Models\BoothData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            $colorGet = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            ?>
            {{-- {{$colorGet->red_green_blue??''}} --}}
            <div class="width-33">
                <div class="listimg">
                    <img src="{{$item->url}}" class="w-100 h-100" />
                    @if (isset($colorGet) && $colorGet->red_green_blue == 'green')
                    <div class="green_box" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-url="{{route('parshad.update.color')}}" data-color="green">
                    </div>
                    @elseif (isset($colorGet) && $colorGet->red_green_blue == 'blue')
                    <div class="yellow_box" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-url="{{route('parshad.update.color')}}" data-color="blue">
                    </div>
                    @elseif (isset($colorGet) && $colorGet->red_green_blue == 'red')
                    <div class="red_box" data-wardid="{{$item->ward_id}}" data-partid="{{$item->part_id}}"
                        data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}"
                        data-url="{{route('parshad.update.color')}}" data-color="red"></div>
                    @else
                    <div class="border_box" data-wardid="{{$item->ward_id}}" data-partid="{{$item->part_id}}"
                        data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}"
                        data-url="{{route('parshad.update.color')}}" data-color="grey"></div>
                    @endif
                    @if (isset($boothData))
                    <span class="done">Done</span>
                    @else
                    <span class="pending">Pending</span>
                    @endif
                </div>
            </div>
            @endforeach
            @elseif($boothDataDone)
            @foreach ($boothDataDone as $index => $item)
            <?php
            $eroData = App\Models\EROData::where(['ward_id' => $user->ward_id, 'part_id' => $part_id,'s_no' => $item->s_no])->first();
            // $boothData = App\Models\BoothData::where(['parshad_id' => $user->parshad_id, 'agent_id' => $user->id, 'ward_id' => $user->parshads->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            $colorGet = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            ?>
            <div class="width-33">
                <div class="listimg">
                    <img src="{{$eroData->url??''}}" class="w-100 h-100" />
                    @if (isset($colorGet) && $colorGet->red_green_blue == 'green')
                    <div class="green_box" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-color="green">
                    </div>
                    @elseif (isset($colorGet) && $colorGet->red_green_blue == 'blue')
                    <div class="yellow_box" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-color="blue">
                    </div>
                    @elseif (isset($colorGet) && $colorGet->red_green_blue == 'red')
                    <div class="red_box" data-wardid="{{$item->ward_id}}" data-partid="{{$item->part_id}}"
                        data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}" data-color="red"></div>
                    @else
                    <div class="border_box" data-wardid="{{$item->ward_id}}" data-partid="{{$item->part_id}}"
                        data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}" data-color="grey"></div>
                    @endif
                    <span class="done">Done</span>
                </div>
            </div>
            @endforeach
            @elseif($boothDataPending)
            @foreach ($boothDataPending as $index => $item)
            <?php
            // $boothData = App\Models\BoothData::where(['parshad_id' => $user->parshad_id, 'agent_id' => $user->id, 'ward_id' => $user->parshads->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            $colorGet = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            ?>
            <div class="width-33">
                <div class="listimg">
                    <img src="{{$item->url}}" class="w-100 h-100" />
                    @if (isset($colorGet) && $colorGet->red_green_blue == 'green')
                    <div class="green_box" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-color="green">
                    </div>
                    @elseif (isset($colorGet) && $colorGet->red_green_blue == 'blue')
                    <div class="yellow_box" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-color="blue">
                    </div>
                    @elseif (isset($colorGet) && $colorGet->red_green_blue == 'red')
                    <div class="red_box" data-wardid="{{$item->ward_id}}" data-partid="{{$item->part_id}}"
                        data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}" data-color="red"></div>
                    @else
                    <div class="border_box" data-wardid="{{$item->ward_id}}" data-partid="{{$item->part_id}}"
                        data-sno="{{$item->s_no}}" data-parshad="{{$user->id}}" data-color="grey"></div>
                    @endif
                    <span class="pending">Pending</span>
                </div>
            </div>
            @endforeach
            @else

            @endif
        </div>
    </div>
</div>

@endsection
