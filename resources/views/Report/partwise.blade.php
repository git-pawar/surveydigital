@extends('master')
@section('title','Part wise report')
@section('content')

<style>

</style>
<div class="maininnersection">
    <div class="w-100 mb-2 row mx-0">
        <!-- <label for="ward_no" class="labelinput">Ward No - <span
                class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label> -->

        <form method="get" action="{{route('report.typewise',['type'=>'partwise'])}}">
        <div class="row mx-0">
        <div class="width-50">
           <select class="form-control selectinput mb-1" name="searchq" onchange="this.form.submit()">
                <option value="">Select Part No </option>
                @if (count($parts))
                @foreach ($parts as $item)
                <option value="{{$item->id}}" @if (isset($searchq)) @if ($searchq==$item->id) selected @endif
                    @endif>{{$item->part_no}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="width-50">
              <select class="form-control selectinput " name="searchq" onchange="this.form.submit()">
                <option value="">filter By </option>
                <option>Part Wise</option>
                <option>Name Wise</option>
                 <option> House No Wise</option>
                 <option>Category Wise</option>
                 <option>Color Wise</option>
                 <option>Mobile No wise </option>
                 <option>Voter list</option>

            </select>
       </div>

        </div>
    <div class="w-100 row mx-0 mt-2 padding_10">
            <div class="width-80">
                <div class="form-row mb-2" data-validate="Name required">

                    <input type="search" id="search1" value="" placeholder="Search name" name="searchq" class="partwise form-control mb-0 validate_this">
                </div>
            </div>
            <div class="width-20 py-0 margin-1">
                <button type="submit" class="btn_search submit_button" ><i class="fas fa-search"></i></button>
            </div>

       </div>

       <div class="w-100 row mx-0 mt-2">
            <div class="width-80">
               <select class="form-control selectinput validate_this" >
                <option value="">Category </option>
             </select>
        </div>
          <div class="width-20 py-0 m-t-5">
                <button  class="btn_search submit_button" ><i class="fas fa-search"></i></button>
         </div>

      </div>
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
