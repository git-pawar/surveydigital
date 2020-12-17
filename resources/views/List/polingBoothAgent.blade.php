@extends('master')
@section('title','Poling Booth agent List')
@section('content')
<div class="maininnersection">
    <div class="table-responsive" id="boothAgentList">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Bhag/Part No</th>

                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @if(count($boothAgent))
                @foreach ($boothAgent as $index => $item)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->mobile}}</td>
                    <td>{{str_pad($item->part_nos->part_no,2,0,STR_PAD_LEFT)??'-'}}</td>

                    <td>
                        <div class="row mx-0">
                            <a class="btn-primary  btns"
                                href="{{route('parshad.edit.booth.agent',base64_encode($item->id))}}"><i
                                    class="fas fa-edit" aria-hidden="true"></i></a>
                            <a class="btn-danger btns" href="javascript:void(0);"
                                onclick="confirm(this,'{{route('parshad.delete.booth.agent',base64_encode($item->id))}}','get','Are you sure?','Yes! delete it','No! keep it','boothAgentList');"><i
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
