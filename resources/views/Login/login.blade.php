@extends('master')
@section('title','Login')
@section('content')
<style>
.btn-dark {
    color: #fff;
    background-color: #012954 !important;
}
</style>

<div class="maindiv">
    <!-- Default form register -->
    <form class="text-center" id="adminLogin" method="post" action="{{route('admin.login.process')}}">
        @csrf
        <p class="h4 mb-4">Log in</p>

        <div class="form-row mb-4">
            <!-- E-mail -->
            <div class="form-group d-block w-100" data-validate="Mobile no is not valid">
                <input type="text" id="mobile" name="mobile" class="only-num form-control mb-4 validate_this"
                    placeholder="Mobile No" data-len="10" />
            </div>

            <!-- Password -->
            <div class="form-group  d-block w-100" data-validate="Password is required">
                <input type="password" id="password" name="password" class="form-control validate_this"
                    placeholder="Password" />
            </div>
        </div>

        <!-- Sign up button -->
        <button type="submit" class="btn btn-dark my-4 btn-block submit_button" data-id="adminLogin">
            Sign in
        </button>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@stop
