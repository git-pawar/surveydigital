<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
 <link rel="stylesheet" href="{{url('css/media.css')}}" />
    <link rel="stylesheet" type="text/css" href="{!! url('Validation/validation.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('alerts/notiflix-2.4.0.min.css')!!}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet" />

</head>
<body>
    <div class="maininnersection">
    <!-- Default form register -->
    <form class="text-center" id="boothData" action="{{route('agent.data.store')}}" method="POST">
        @csrf

        <div class="row mx-0">

            <div class="">
                <div class="form-row mb-4" data-validate="Serial No required">
                    <label for="s_no" class="labelinput">Serial No</label>
                    <input type="text" id="s_no" name="s_no" value="{{old('s_no')}}"
                        class="input_section form-control mb-0 only-num validate_this" />
                </div>
            </div>
        </div>


        <input type="hidden" name="id" value="">
<div class="submitbtn">
            <button class=" btn btnblue btn-block  px-5 pt-2" data-id="boothData" type="submit">
                Save
            </button>
        </div>

    </form>
</div>
</body>
</html>
