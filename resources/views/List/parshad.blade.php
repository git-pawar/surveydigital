@extends('master')
@section('title','Parshad List')
@section('content')
<div class="maininnersection">
    <div class="table-responsive" id="parshadList">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Ward No</th>
                    <th scope="col">Ward Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @if(count($parshad))
                @foreach ($parshad as $index => $item)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->ward_no}}</td>
                    <td>{{$item->ward_name}}</td>
                    <td>{{$item->mobile}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->cities->city_name??'N/A'}}</td>
                    <td>
                        <div class="row mx-0">
                            <a class="btn-primary btns"
                                href="{{route('admin.edit.parshad',base64_encode($item->id))}}"><i class="fas fa-edit"
                                    aria-hidden="true"></i></a>
                            <a class="btn-danger btns" href="javascript:void(0);"
                                onclick="confirm(this,'{{route('admin.delete.parshad',base64_encode($item->id))}}','get','Are you sure?','Yes! delete it','No! keep it','parshadList');"><i
                                    class="fas fa-trash" aria-hidden="true"></i></a>
                            <a class="btn-info btns"
                                href="{{route('admin.parshad.voter.list',base64_encode($item->id))}}"><i class="fas fa-file"
                                    aria-hidden="true"></i></a>
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
