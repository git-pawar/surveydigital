@extends('master')
@section('title','Color wise report')
@section('content')

<style>

</style>
<div class="maininnersection">
    <div class="w-100 mb-2 row mx-0">
        <label for="ward_no" class="labelinput">Ward No - <span
                class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label>

        <form method="get" action="{{route('report.typewise',['type'=>'colorwise'])}}">
            <select class="form-control selectinput" name="searchq" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="green" @if (isset($searchq)) @if ($searchq=='green' ) selected @endif @endif>Green
                <option value="blue" @if (isset($searchq)) @if ($searchq=='blue' ) selected @endif @endif>Yellow
                <option value="red" @if (isset($searchq)) @if ($searchq=='red' ) selected @endif @endif>Red
                </option>
            </select>
        </form>
    </div>
    <div class="table-responsive" id="surveyorList">
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
                        <div class="" style="width:30px; height:15px; background-color:green"></div>
                        @elseif($item->red_green_blue == 'blue')
                        <div class="" style="width:30px; height:15px; background-color:yellow"></div>
                        @elseif($item->red_green_blue == 'red')
                        <div class="" style="width:30px; height:15px; background-color:red"></div>
                        @endif</td>
                    <td class="text-center">{{str_pad($item->voter_count,2,0,STR_PAD_LEFT)??0}}</td>
                    <td class="text-center">{{$item->mobile??'N/A'}}</td>
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
@endsection
