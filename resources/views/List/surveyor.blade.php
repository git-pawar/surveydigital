@extends('master')
@section('title','Survey User List')
@section('content')
<style>
    /* p {
        margin-bottom: 0px !important;
    } */
</style>
<div class="maininnersection">
    <div class="table-responsive" id="surveyorList">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th class="" scope="col">Bhag/Part No</th>
                    <th class="" scope="col">Section</th>
                    <th scope="col">Allotted Sec.</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @if(count($surveyor))
                @foreach ($surveyor as $index => $item)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->mobile}}</td>
                    <td class="">
                        <p class="text-left mb-0"><b>Name :</b> {{$item->part_nos->part_name}}</p>
                        <p class="text-left mb-0"><b>No. :</b> {{$item->part_nos->part_no}}</p>
                        {{-- <p class="text-left mb-0"><b>Tot. Voter :</b> {{$item->part_nos->total_voter}}</p> --}}
                    </td>
                    <td>
                        <p class="text-left mb-0"><b>Name :</b> {{$item->sections->section_name}}</p>
                        <p class="text-left mb-0"><b>No. :</b> {{$item->sections->section_no}}</p>
                        {{-- <p class="text-left mb-0"><b>Tot. Voter :</b> {{$item->sections->total_voter}}</p> --}}
                    </td>
                    <td>{{$item->s_no_from}} To {{$item->s_no_to}}</td>
                    <td>
                        <div class="row">
                            <a class="btn-primary  btns"
                                href="{{route('parshad.edit.surveyor',base64_encode($item->id))}}"><i
                                    class="fas fa-edit" aria-hidden="true"></i></a>
                            <a class="btn-danger btns" href="javascript:void(0);"
                                onclick="confirm(this,'{{route('parshad.delete.surveyor',base64_encode($item->id))}}','post','Are you sure?','Yes! delete it','No! keep it','surveyorList');"><i
                                    class="fas fa-trash" aria-hidden="true"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop
