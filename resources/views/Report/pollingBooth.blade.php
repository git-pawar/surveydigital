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
            // $boothData = App\Models\BoothData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            $colorGet = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            ?>
            {{-- {{$colorGet->red_green_blue??''}} --}}
            <div class="width-33">
                <div class="listimg">
                    <img src="{{$item->url}}" class="w-100 h-100" />
                    @if(isset($item->mobile))
                    <a href="tel:{{$item->mobile??''}}"><img class="calling-user"
                            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik0yNTYsMEMxMTQuNjE3LDAsMCwxMTQuNjE3LDAsMjU2YzAsNTIuMDMsMTUuNTYzLDEwMC40MTQsNDIuMjMxLDE0MC44MThMMCw1MTJsMTE5LjEyOC0zOS43MDYgIEMxNTguNzIsNDk3LjM5OSwyMDUuNjM5LDUxMiwyNTYsNTEyYzE0MS4zODMsMCwyNTYtMTE0LjYxNywyNTYtMjU2UzM5Ny4zODMsMCwyNTYsMHoiIGZpbGw9IiMwMTI5NTQiIGRhdGEtb3JpZ2luYWw9IiMyNWFlODgiIGNsYXNzPSIiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMzk3LjIzMywzMzUuMDc4VjM3Ny42YzAuMDYyLDE1LjY2LTEyLjYwNiwyOC4zOTgtMjguMjkyLDI4LjQ2OWMtMC44OTIsMC0xLjc4My0wLjAzNS0yLjY3NS0wLjExNSAgYy00My43MDUtNC43NC04NS42ODktMTkuNjQxLTEyMi41NzEtNDMuNTJjLTM0LjMxMy0yMS43Ni02My40MDktNTAuODAzLTg1LjIyMi04NS4wNTRjLTI0LjAwMi0zNi45NzktMzguOTM4LTc5LjA4Ni00My41OTktMTIyLjg5OCAgYy0xLjQxMi0xNS41OSwxMC4xMDgtMjkuMzc4LDI1LjczMi0zMC43OTFjMC44NDctMC4wNjIsMS42ODYtMC4xMDYsMi41MzQtMC4xMDZoNDIuNjExYzE0LjI1Ny0wLjE0MSwyNi40MTIsMTAuMjkzLDI4LjQwNywyNC4zODIgIGMxLjgwMSwxMy42MTIsNS4xMzgsMjYuOTY4LDkuOTQsMzkuODNjMy45MDIsMTAuMzY0LDEuNDA0LDIyLjA0Mi02LjM5MSwyOS45MDhsLTE4LjAzNSwxNy45OTkgIGMyMC4yMTUsMzUuNDg3LDQ5LjY2NCw2NC44NzQsODUuMjIxLDg1LjA1NGwxOC4wMzUtMTcuOTk5YzcuODgzLTcuNzg2LDE5LjU4OC0xMC4yNzUsMjkuOTctNi4zODIgIGMxMi44ODgsNC44MDIsMjYuMjcxLDguMTMsMzkuOTEsOS45MjJDMzg3LjA5LDMwOC4zMTIsMzk3LjU5NCwzMjAuNjg5LDM5Ny4yMzMsMzM1LjA3OHoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiIGNsYXNzPSIiPjwvcGF0aD4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==" /></a>
                    @endif
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
                    @if (isset($colorGet->attend_booth))
                    @if($colorGet->attend_booth == 1)
                    <span class="done">Done</span>
                    @else
                    <span class="pending">Pending</span>
                    @endif
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
            // $colorGet = App\Models\SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 's_no' => $item->s_no])->first();
            ?>
            <div class="width-33">
                <div class="listimg">
                    <img src="{{$eroData->url??''}}" class="w-100 h-100" />
                    @if(isset($eroData->mobile))
                    <a href="tel:{{$eroData->mobile??''}}"><img class="calling-user"
                            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik0yNTYsMEMxMTQuNjE3LDAsMCwxMTQuNjE3LDAsMjU2YzAsNTIuMDMsMTUuNTYzLDEwMC40MTQsNDIuMjMxLDE0MC44MThMMCw1MTJsMTE5LjEyOC0zOS43MDYgIEMxNTguNzIsNDk3LjM5OSwyMDUuNjM5LDUxMiwyNTYsNTEyYzE0MS4zODMsMCwyNTYtMTE0LjYxNywyNTYtMjU2UzM5Ny4zODMsMCwyNTYsMHoiIGZpbGw9IiMwMTI5NTQiIGRhdGEtb3JpZ2luYWw9IiMyNWFlODgiIGNsYXNzPSIiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMzk3LjIzMywzMzUuMDc4VjM3Ny42YzAuMDYyLDE1LjY2LTEyLjYwNiwyOC4zOTgtMjguMjkyLDI4LjQ2OWMtMC44OTIsMC0xLjc4My0wLjAzNS0yLjY3NS0wLjExNSAgYy00My43MDUtNC43NC04NS42ODktMTkuNjQxLTEyMi41NzEtNDMuNTJjLTM0LjMxMy0yMS43Ni02My40MDktNTAuODAzLTg1LjIyMi04NS4wNTRjLTI0LjAwMi0zNi45NzktMzguOTM4LTc5LjA4Ni00My41OTktMTIyLjg5OCAgYy0xLjQxMi0xNS41OSwxMC4xMDgtMjkuMzc4LDI1LjczMi0zMC43OTFjMC44NDctMC4wNjIsMS42ODYtMC4xMDYsMi41MzQtMC4xMDZoNDIuNjExYzE0LjI1Ny0wLjE0MSwyNi40MTIsMTAuMjkzLDI4LjQwNywyNC4zODIgIGMxLjgwMSwxMy42MTIsNS4xMzgsMjYuOTY4LDkuOTQsMzkuODNjMy45MDIsMTAuMzY0LDEuNDA0LDIyLjA0Mi02LjM5MSwyOS45MDhsLTE4LjAzNSwxNy45OTkgIGMyMC4yMTUsMzUuNDg3LDQ5LjY2NCw2NC44NzQsODUuMjIxLDg1LjA1NGwxOC4wMzUtMTcuOTk5YzcuODgzLTcuNzg2LDE5LjU4OC0xMC4yNzUsMjkuOTctNi4zODIgIGMxMi44ODgsNC44MDIsMjYuMjcxLDguMTMsMzkuOTEsOS45MjJDMzg3LjA5LDMwOC4zMTIsMzk3LjU5NCwzMjAuNjg5LDM5Ny4yMzMsMzM1LjA3OHoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiIGNsYXNzPSIiPjwvcGF0aD4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==" /></a>
                    @endif
                    @if (isset($item->red_green_blue) && $item->red_green_blue == 'green')
                    <div class="green_box" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-color="green">
                    </div>
                    @elseif (isset($item->red_green_blue) && $item->red_green_blue == 'blue')
                    <div class="yellow_box" data-partid="{{$item->part_id}}" data-sno="{{$item->s_no}}"
                        data-parshad="{{$user->id}}" data-color="blue">
                    </div>
                    @elseif (isset($item->red_green_blue) && $item->red_green_blue == 'red')
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
                    @if(isset($item->mobile))
                    <a href="tel:{{$item->mobile??''}}"><img class="calling-user"
                            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHN0eWxlPSIiIGQ9Ik0yNTYsMEMxMTQuNjE3LDAsMCwxMTQuNjE3LDAsMjU2YzAsNTIuMDMsMTUuNTYzLDEwMC40MTQsNDIuMjMxLDE0MC44MThMMCw1MTJsMTE5LjEyOC0zOS43MDYgIEMxNTguNzIsNDk3LjM5OSwyMDUuNjM5LDUxMiwyNTYsNTEyYzE0MS4zODMsMCwyNTYtMTE0LjYxNywyNTYtMjU2UzM5Ny4zODMsMCwyNTYsMHoiIGZpbGw9IiMwMTI5NTQiIGRhdGEtb3JpZ2luYWw9IiMyNWFlODgiIGNsYXNzPSIiPjwvcGF0aD4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNMzk3LjIzMywzMzUuMDc4VjM3Ny42YzAuMDYyLDE1LjY2LTEyLjYwNiwyOC4zOTgtMjguMjkyLDI4LjQ2OWMtMC44OTIsMC0xLjc4My0wLjAzNS0yLjY3NS0wLjExNSAgYy00My43MDUtNC43NC04NS42ODktMTkuNjQxLTEyMi41NzEtNDMuNTJjLTM0LjMxMy0yMS43Ni02My40MDktNTAuODAzLTg1LjIyMi04NS4wNTRjLTI0LjAwMi0zNi45NzktMzguOTM4LTc5LjA4Ni00My41OTktMTIyLjg5OCAgYy0xLjQxMi0xNS41OSwxMC4xMDgtMjkuMzc4LDI1LjczMi0zMC43OTFjMC44NDctMC4wNjIsMS42ODYtMC4xMDYsMi41MzQtMC4xMDZoNDIuNjExYzE0LjI1Ny0wLjE0MSwyNi40MTIsMTAuMjkzLDI4LjQwNywyNC4zODIgIGMxLjgwMSwxMy42MTIsNS4xMzgsMjYuOTY4LDkuOTQsMzkuODNjMy45MDIsMTAuMzY0LDEuNDA0LDIyLjA0Mi02LjM5MSwyOS45MDhsLTE4LjAzNSwxNy45OTkgIGMyMC4yMTUsMzUuNDg3LDQ5LjY2NCw2NC44NzQsODUuMjIxLDg1LjA1NGwxOC4wMzUtMTcuOTk5YzcuODgzLTcuNzg2LDE5LjU4OC0xMC4yNzUsMjkuOTctNi4zODIgIGMxMi44ODgsNC44MDIsMjYuMjcxLDguMTMsMzkuOTEsOS45MjJDMzg3LjA5LDMwOC4zMTIsMzk3LjU5NCwzMjAuNjg5LDM5Ny4yMzMsMzM1LjA3OHoiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiIGNsYXNzPSIiPjwvcGF0aD4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==" /></a>
                    @endif
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
