@extends('master')
@section('title','Part wise report')
@section('content')

<style>

</style>
<div class="maininnersection">
<div class="w-100 mb-2 row mx-0">
                <label for="ward_no" class="labelinput">Ward No -<span
                        class="mx-1">1</span></label>


          <select class="form-control selectinput">
          <option>Select Part No </option>
          </select>

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
@endsection
