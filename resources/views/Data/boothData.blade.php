@extends('master')
@section('title','Booth Data Entry')
@section('content')
<style>

</style>
<div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="boothData" action="{{route('agent.data.store')}}" method="POST">
        @csrf

        <div class="row mx-0">

            <div class="width-50">
                <div class="form-row mb-4" data-validate="Serial No required">

                    <input type="number" id="s_no" name="s_no" placeholder="Serial No" value="{{old('s_no')}}"
                        class="input_section form-control mb-0 only-num validate_this" />
                </div>
            </div>
            <input type="hidden" name="id" value="">
            <div class="width-50">
                <button class=" px-3 py-1 btn btnblue  survey_submit m-0" data-id="boothData" type="submit">
                    <i class="fas fa-save mr-1"></i> Save
                </button>

            </div>
        </div>




    </form>
</div>
@stop
