@extends('master')
@section('title','Home')
@section('content')
<div class="maindiv">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        <p class="h4 mb-4">Admin</p>

        <div class="form-row mb-4">
            <!-- E-mail -->
            <a href="{{route('admin.create.parshad')}}" class="btn btn-wa">Create Parshad</a>
            <a href="{{route('admin.list.parshad')}}" class="btn btn-wa">List Parshad</a>
            <a href="{{route('admin.image.upload.index')}}" class="btn btn-wa">Upload Image</a>
            <a href="{{route('admin.create.ward.user')}}" class="btn btn-wa">Create Ward User</a>
            <a href="{{route('admin.list.warduser')}}" class="btn btn-wa">List Ward User</a>
            {{-- <a href="" class="btn btn-wa">Reports</a> --}}
            <a href="{{route('admin.logout')}}" class="btn btn-wa">Logout</a>



            <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@endsection
