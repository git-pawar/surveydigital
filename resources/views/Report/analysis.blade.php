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
                    <th class="text-center" rowspan="2">Part no</th>
                    <th class="text-center" rowspan="2">Total Voters</th>
                    <th class="text-center" rowspan="1" colspan="3">Voting Done</th>
                    <th class="text-center" rowspan="1" colspan="3">Voting Pending</th>
                    <th class="text-center" rowspan="2">Done Per </th>
                    <th class="text-center" rowspan="2">Pending Per </th>
                </tr>
                <tr>
                    <td class="text-center" rowspan="1">Green</td>
                    <td class="text-center" rowspan="1">Yellow</td>
                    <td class="text-center" rowspan="1">Red</td>
                    <td class="text-center" rowspan="1">Green</td>
                    <td class="text-center" rowspan="1">Yellow</td>
                    <td class="text-center" rowspan="1">Red</td>
                </tr>
            </thead>
            <tbody>
                @if (count($partData))
                @foreach ($partData as $index => $item)
                <?php
                    $greenAttend = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $item->id,'red_green_blue'=>'green','attend_booth'=>1])->count('id');
                    $greenPending = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $item->id,'red_green_blue'=>'green','attend_booth'=>0])->count('id');
                    $yellowAttend = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $item->id,'red_green_blue'=>'blue','attend_booth'=>1])->count('id');
                    $yellowPending = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $item->id,'red_green_blue'=>'blue','attend_booth'=>0])->count('id');
                    $redAttend = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $item->id,'red_green_blue'=>'red','attend_booth'=>1])->count('id');
                    $redPending = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $item->id,'red_green_blue'=>'red','attend_booth'=>0])->count('id');
                    $doneTotal = $greenAttend + $yellowAttend + $redAttend;
                    $donePer = 0;
                    if($doneTotal>0){
                        $donePer =  $doneTotal * 100 /$item->total_voter;
                    }
                    $pendigTotal = $greenPending + $yellowPending + $redPending;
                    $pendigPer = 0;
                    if($pendigTotal>0){
                        $pendigPer =  $pendigTotal * 100 /$item->total_voter;
                    }
                ?>
                <tr>
                    {{-- <td class="text-center">{{str_pad($index+1,2,0,STR_PAD_LEFT)}}</td> --}}
                    {{-- <td class="text-center">1</td> --}}
                    <td class="text-center">{{str_pad($item->part_no,2,0,STR_PAD_LEFT)??''}}</td>
                    <td class="text-center">{{$item->total_voter??0}}</td>
                    <td class="text-center">{{$greenAttend}}</td>
                    <td class="text-center">{{$yellowAttend}}</td>
                    <td class="text-center">{{$redAttend}}</td>
                    <td class="text-center">{{$greenPending}}</td>
                    <td class="text-center">{{$yellowPending}}</td>
                    <td class="text-center">{{$redPending}}</td>
                    <td class="text-center">{{round($donePer,2)}}%
                    </td>
                    <td class="text-center">{{round($pendigPer,2)}}%
                    </td>
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
