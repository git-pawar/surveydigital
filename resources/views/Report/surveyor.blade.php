@extends('master')
@section('title','Surveyor report')
@section('content')

<style>

</style>
<div class="maininnersection">
    <div class="w-100 mb-2 row mx-0">
        <div class="width-60 mb-2">
            <label for="ward_no" class="labelinput">Ward No -<span
                    class="mx-0">{{$user->parshads->wards->ward_no??''}}</span></label>
            <span class="mx-0">,</span>
            <label for="part_no" class="labelinput">Part No -<span
                    class="mx-0">{{$user->part_nos->part_no??''}}</span></label>
        </div>
        <div class="width-40 mb-2">
            <form method="get" action="{{route('surveyor.report')}}">
                <select class="form-control selectinput" name="filterBy" onchange="this.form.submit()">
                    <option value="all" @if (isset($filterBy)) @if ($filterBy=='all' ) selected @endif @endif>All
                    <option value="done" @if (isset($filterBy)) @if ($filterBy=='done' ) selected @endif @endif>Done
                    <option value="pending" @if (isset($filterBy)) @if ($filterBy=='pending' ) selected @endif @endif>
                        Pending
                    </option>
                </select>
            </form>
        </div>
    </div>
    <div class="table-responsive" id="surveyorList">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="">S.No.</th>
                    <th class="">House No </th>
                    <th>Cast </th>
                    <th>Category </th>
                    <th>Colour </th>
                    <th>Family Member Count</th>
                    <th>Mobile</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                @if (count($surveyDataAll))
                @foreach ($surveyDataAll as $index => $item)
                <?php
                    $surveyData = App\Models\SurveyData::where(['parshad_id' => $user->parshad_id, 'surveyor_id' => $user->id, 'ward_id' => $user->parshads->ward_id, 'part_id' => $user->part_id,'s_no'=>$item->s_no])->first();
                ?>
                <tr>
                    {{-- <td class="text-center">{{str_pad($index+1,2,0,STR_PAD_LEFT)}}</td> --}}
                    {{-- <td class="text-center">1</td> --}}
                    <td class="text-center">{{$surveyData->name??'-'}}</td>
                    <td class="text-center">{{str_pad($item->s_no,2,0,STR_PAD_LEFT)??''}}</td>
                    <td class="text-center">{{$surveyData->house_no??'-'}}</td>
                    <td class="text-center">{{$surveyData->cast??'-'}}</td>
                    <td class="text-center">{{$surveyData->category??'-'}}</td>
                    <td class="text-center">
                        @if($surveyData)
                        @if ($surveyData->red_green_blue == 'green')
                        <div class="" style="width:30px; height:15px; background-color:green"></div>
                        @elseif($surveyData->red_green_blue == 'blue')
                        <div class="" style="width:30px; height:15px; background-color:yellow"></div>
                        @elseif($surveyData->red_green_blue == 'red')
                        <div class="" style="width:30px; height:15px; background-color:red"></div>
                        @endif
                        @else
                        <div class="" style="width:30px; height:15px; background-color:#ccc"></div>
                        @endif</td>
                    <td class="text-center">
                        {{isset($surveyData->voter_count)?str_pad($surveyData->voter_count,2,0,STR_PAD_LEFT):'-'}}
                    </td>
                    <td class="text-center">{{$surveyData->mobile??'-'}}</td>
                    <td class="text-center">{{$surveyData->remark??'-'}}</td>
                </tr>
                @endforeach
                @elseif (count($surveyDataDone))
                @foreach ($surveyDataDone as $index => $item)
                <tr>
                    {{-- <td class="text-center">{{str_pad($index+1,2,0,STR_PAD_LEFT)}}</td> --}}
                    {{-- <td class="text-center">1</td> --}}
                    <td class="text-center">{{$item->name??'N/A'}}</td>
                    <td class="text-center">{{str_pad($item->s_no,2,0,STR_PAD_LEFT)??''}}</td>
                    <td class="text-center">{{$item->house_no??''}}</td>
                    <td class="text-center">{{$item->cast??''}}</td>
                    <td class="text-center">{{$item->category??''}}</td>
                    <td class="text-center">
                        @if ($item->red_green_blue == 'green')
                        <div class="" style="width:30px; height:15px; background-color:green"></div>
                        @elseif($item->red_green_blue == 'blue')
                        <div class="" style="width:30px; height:15px; background-color:yellow"></div>
                        @elseif($item->red_green_blue == 'red')
                        <div class="" style="width:30px; height:15px; background-color:red"></div>
                        @else
                        <div class="" style="width:30px; height:15px; background-color:#ccc"></div>
                        @endif
                    </td>
                    <td class="text-center">{{str_pad($item->voter_count,2,0,STR_PAD_LEFT)??0}}</td>
                    <td class="text-center">{{$item->mobile??'N/A'}}</td>
                    <td class="text-center">{{$item->remark??'N/A'}}</td>
                </tr>
                @endforeach
                @elseif (count($surveyDataPending))
                @foreach ($surveyDataPending as $index => $item)
                <tr>
                    {{-- <td class="text-center">{{str_pad($index+1,2,0,STR_PAD_LEFT)}}</td> --}}
                    {{-- <td class="text-center">1</td> --}}
                    <td class="text-center">-</td>
                    <td class="text-center">{{str_pad($item->s_no,2,0,STR_PAD_LEFT)??''}}</td>
                    <td class="text-center">-</td>
                    <td class="text-center">-</td>
                    <td class="text-center">-</td>
                    <td class="text-center">
                        <div class="" style="width:30px; height:15px; background-color:#ccc"></div>
                    </td>
                    <td class="text-center">-</td>
                    <td class="text-center">-</td>
                    <td class="text-center">-</td>
                </tr>
                @endforeach
                @else
                <td class="text-center" colspan="9">No data</td>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
