@extends('master')
@section('title','Part wise report')
@section('content')

<style>

</style>
<div class="maininnersection">
    <div class="w-100 mb-2 row mx-0">
        <!-- <label for="ward_no" class="labelinput">Ward No - <span
                class="mx-1">{{str_pad($user->wards->ward_no,2,0,STR_PAD_LEFT)}}</span></label> -->

        <form method="get" action="{{route('report.typewise',['type'=>'partwise'])}}" id="searchData">
            <div class="row mx-0">
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
            <div class="w-100 row mx-0 mt-2 padding_10" id="inputSearch" @if ($filterBy=='Name' || $filterBy=='House'
                ||$filterBy=='Mobile' ) style="display: block;" @else style="display: none;" @endif>
                <div class="width-80">
                    <div class="form-row mb-2" data-validate="Name required">

                        <input type="search" id="" value="{{isset($inputSearch)?$inputSearch:''}}"
                            placeholder="Search name, house, mobile" name="inputSearch"
                            class="partwise form-control mb-0 validate_this">
                    </div>
                </div>
                <div class="width-20 py-0 margin-1">
                    <button type="submit" class="btn_search" data-id="searchData"><i class="fas fa-search"></i></button>
                </div>

            </div>

            <div class="w-100 row mx-0 mt-2" id="categorySearch" @if ($filterBy=='Category' ) style="display: block;"
                @else style="display: none;" @endif>
                <div class="width-80">
                    <select class="form-control selectinput validate_this" name="categorySearch">
                        <option value="">All</option>
                        <option value="General" @if (isset($categorySearch)) @if ($categorySearch=='General' ) selected
                            @endif @endif>
                            General
                        </option>
                        <option value="OBC" @if (isset($categorySearch)) @if ($categorySearch=='OBC' ) selected @endif
                            @endif>OBC
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
                    <button type="submit" class="btn_search" data-id="searchData"><i class="fas fa-search"></i></button>
                </div>

            </div>
            <div class="w-100 row mx-0 mt-2" id="colorSearch" @if ($filterBy=='Color' ) style="display: block;" @else
                style="display: none;" @endif>
                <div class="width-80">
                    <select class="form-control selectinput validate_this" name="colorSearch">
                        <option value="">All</option>
                        <option value="green" @if (isset($colorSearch)) @if ($colorSearch=='green' ) selected @endif
                            @endif>
                            Green
                        <option value="blue" @if (isset($colorSearch)) @if ($colorSearch=='blue' ) selected @endif
                            @endif>Yellow
                        <option value="red" @if (isset($colorSearch)) @if ($colorSearch=='red' ) selected @endif @endif>
                            Red
                        </option>
                    </select>
                </div>
                <div class="width-20 py-0 m-t-5">
                    <button type="submit" class="btn_search" data-id="searchData"><i class="fas fa-search"></i></button>
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
</script>
@endsection
