@extends('master')
@section('title','Voter List')
@section('content')

<style>
.width-80 {
    width: 80%;
    padding-left: 8px;
}
.searchbtn{

}
</style>
<div class="maininnersection px-2 position-relative">
  <p class="titlesection px-2">Part Wise

  </p>

  <div class="row mx-0">
     <div class="width-80">
                <div class="form-row mb-2" data-validate="House No required">
                    <label for="house_no" class="labelinput">Search</label>
                    <input type="search" id="search1" value="" name=""
                        class="input_section form-control mb-0 validate_this" />
                </div>
            </div>
              <div class="width-20">
      <button class="btn_search "><i class="fas fa-search"></i></button>
  </div>
  </div>
  <div class="table-responsive" id="surveyorList">
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Ward No</th>
                    <th>Part no</th>
                    <th class="">S.No.</th>
                    <th class="" >House No </th>
                    <th>Cast </th>
                    <th>Category </th>
                    <th>Colour Search </th>
                    <th>Family Member Count</th>
                    <th>Mobile Number</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
            <td class="text-center">1</td>
            <td class="text-center">1</td>
             <td class="text-center">1</td>
            <td class="text-center">1</td>
             <td class="text-center">1</td>
            <td class="text-center">1</td>
             <td class="text-center">1</td>
            <td class="text-center">1</td>
             <td class="text-center">1</td>
            <td class="text-center">1</td>
             <td class="text-center">1</td>

            </tbody>
    </table>
 </div>

  </div>
  </div>
 </div>

@endsection
