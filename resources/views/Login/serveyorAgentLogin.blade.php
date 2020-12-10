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
    <form class="text-center" id="userLogin" method="POST" action="{{route('login.process')}}">
        @csrf
        <p class="h4 mb-4">Log in</p>

        <div class="form-row mb-4">
            <!-- E-mail -->
            <input type="text" id="mobile" name="mobile" value="{{old('mobile')}}"
                class="form-control mb-4 only-num validate_this" data-len="10" placeholder="Mobile number" />

            <!-- Password -->
            <input type="password" id="password" name="password" class="form-control validate_this"
                placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" />
        </div>

        <!-- Sign up button -->
        <button class="btn btn-dark my-4 btn-block submit_button" data-id="userLogin">
            Sign in
        </button>

        <!-- Terms of service -->
    </form>

    <!-- Default form register -->
</div>
@stop
