@extends('master')
@section('title','Analysis')
@section('content')

<style>

</style>
<div class="maininnersection">
    <div class="w-100 mb-2 row mx-0">
        <label for="ward_no" class="labelinput">Ward No - <span
                class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label>

        {{-- <form method="get" action="{{route('report.typewise',['type'=>'categorywise'])}}">
        <select class="form-control selectinput" name="searchq" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="General" @if (isset($searchq)) @if ($searchq=='General' ) selected @endif @endif>General
            </option>
            <option value="OBC" @if (isset($searchq)) @if ($searchq=='OBC' ) selected @endif @endif>OBC
            </option>
            <option value="ST" @if (isset($searchq)) @if ($searchq=='ST' ) selected @endif @endif>ST
            </option>
            <option value="SC" @if (isset($searchq)) @if ($searchq=='SC' ) selected @endif @endif>SC
            </option>
            <option value="Minority" @if (isset($searchq)) @if ($searchq=='Minority' ) selected @endif @endif>
                Minority
            </option>
        </select>
        </form> --}}
    </div>
    <div class="table-responsive" id="surveyorList">
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>S.no</th> --}}
                    {{-- <th>Ward No</th> --}}
                    <th rowspan="2">Part no</th>
                    <th rowspan="2">Total Voters</th>
                    <th rowspan="1" colspan="3">Voting Done</th>
                    <th rowspan="1" colspan="3">Voting Pending</th>
                    <th rowspan="2">Done Per </th>
                    <th rowspan="2">Pending Per </th>
                </tr>
                <tr>
                    <td rowspan="1">Green</td>
                    <td rowspan="1">Yellow</td>
                    <td rowspan="1">Red</td>
                    <td rowspan="1">Green</td>
                    <td rowspan="1">Yellow</td>
                    <td rowspan="1">Red</td>
                </tr>
            </thead>
            <tbody>
                @if (count($partData))
                @foreach ($partData as $index => $item)
                <?php
                    $totalVoter = App\Models\PartNo::find($item->id)->total_voter;
                ?>
                <tr>
                    {{-- <td class="text-center">{{str_pad($index+1,2,0,STR_PAD_LEFT)}}</td> --}}
                    {{-- <td class="text-center">1</td> --}}
                    <td class="text-center">{{str_pad($item->part_no,2,0,STR_PAD_LEFT)??''}}</td>
                    <td class="text-center">{{$item->total_voter??0}}</td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
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
