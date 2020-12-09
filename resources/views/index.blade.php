@extends('master')
@section('title','Home')
@section('content')
<div class="maindiv">
    <!-- Default form register -->
    <form class="text-center" action="#!">
        <p class="h4 mb-4">Word 38</p>

        <div class="form-row mb-4">
            <!-- E-mail -->
            <a href="{{route('admin.login')}}" class="btn btn-wa">Parshad / Admin Login</a>
            <a href="createserveruser.html" class="btn btn-wa"> Create Survey User</a>
            <a href="polingbooth.html" class="btn btn-wa">Poling Bood Agent</a>
            <a href="" class="btn btn-wa">Reportin</a>



            <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@endsection
