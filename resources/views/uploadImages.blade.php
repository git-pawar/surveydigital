@extends('master')
@section('title','Upload data')
@section('content')
<style>
    .uploadimgview_gallery {
        height: 136px;
        padding: 5px 5px;
        border: 1px solid #ccc;
        margin: 19px 0px;
    }

    .uploadimgview_gallery img {
        height: 100%;
        object-fit: fill;
    }

    .trash_delete i {
        font-size: 16px;
        background-color: white;
        padding: 5px 4px 0px;
        width: 30px;
        color: #fd5555;
        height: 30px;
        border: 1px solid #f00;
        border-radius: 50%;
        text-align: center;
    }

    .trash_delete {
        position: absolute;
        top: 11px;
        right: 5px;
        cursor: pointer;
    }

    /* file-upload css */
    .files input {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 80px 0px 85px 35%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
    }

    .files input:focus {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative
    }

    .files:after {
        pointer-events: none;
        position: absolute;
        top: 48px;
        left: 0;
        width: 31px;
        right: 0;
        height: 50px;
        content: "";
        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .color input {
        background-color: #f1f1f1;
    }

    .files:before {
        position: absolute;
        bottom: 10px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: " or drag it here. ";
        display: block;
        margin: 0 auto;
        color: #2ea591;
        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
    }

    .progress {
        display: flex;
        height: 1rem;
        overflow: hidden;
        font-size: 1rem;
        background-color: #ededed;
        border-radius: 1.28rem;
    }

    .progress-bar {

        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        font-size: 12px;
        font-weight: 600;
        transition: width 0.6s ease;

    }

    .progress-bar-document {

        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        font-size: 12px;
        font-weight: 600;
        transition: width 0.6s ease;

    }

    .inProgress {
        background-color: #428bca;
    }

    .onError {
        background-color: #d9534f;
    }

    .onCompleted {
        background-color: #5cb85c;
    }

    #uploadStatus {
        margin-top: 0.78rem;
    }
</style>
<div class="maininnersection">
    <p class="titlesection">Upload Images</p>
    {{-- <div class="card-header">{{ __('Optical Character Recognition | Image annotation') }}
</div> --}}
<form role="form" method="POST" action="{{route('admin.image.upload')}}" enctype="multipart/form-data">
    @csrf

</form>
</div>

<form id="uploadDocumentForm" enctype="multipart/form-data">

    @csrf
    <div class="card">

        <div class="card-header ">
            <h4 class="card-title pb-sm-2">Upload Certificate/KYC
                Document
            </h4>
        </div>

        <div class="card-body">
            <div class="form-row mb-2" data-validate="Select a state">
                <label for="state" class="labelinput">State</label>
                <select class="browser-default custom-select input_section selet validate_this"
                    onchange="getCity(this,'{{route('getCity')}}','city','');" id="state" name="state">
                    <option value="" selected>Select</option>
                    @if(count($state))
                    @foreach ($state as $item)
                    <option value="{{$item->id}}" @if ($item->id == old('state'))
                        selected
                        @endif>{{$item->state_name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-row mb-2" data-validate="Select a city">
                <label for="city" class="labelinput">City</label>
                <select class="browser-default custom-select input_section selet validate_this" id="city" name="city"
                    onchange="getNN(this,'{{route('getNN')}}','nn_id','nnn_id','city','');">
                    <option value="" selected>Select state first</option>
                </select>
            </div>
            <div class="form-row mb-2" data-validate="Select a NNN Type">
                <label for="nnn_id" class="labelinput">NNN Type</label>
                <select class="browser-default custom-select input_section selet validate_this" id="nnn_id"
                    name="nnn_id" onchange="getNN(this,'{{route('getNN')}}','nn_id','nnn_id','city','');">
                    <option value="" selected>Select</option>
                    @if(count($nnn_type))
                    @foreach ($nnn_type as $item)
                    <option value="{{$item->id}}" @if ($item->id == old('nnn_id'))
                        selected
                        @endif>{{$item->name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-row mb-2" data-validate="Select a NN Type">
                <label for="nn_id" class="labelinput">NN Type</label>
                <select class="browser-default custom-select input_section selet validate_this" id="nn_id" name="nn_id"
                    onchange="getWard(this,'{{route('getWard')}}','ward_id','');">
                    <option value="" selected>Select NNN type first</option>
                </select>
            </div>
            <div class="form-row mb-2" data-validate="Select a Ward">
                <label for="ward_id" class="labelinput">Ward</label>
                <select class="browser-default custom-select input_section selet validate_this" id="ward_id"
                    name="ward_id" onchange="getPart(this,'{{route('getPart')}}','part_id','');">
                    <option value="" selected>Select NN type first</option>
                </select>
            </div>
            <div class="form-row mb-2" data-validate="Select a Part no">
                <label for="part_id" class="labelinput">Part No</label>
                <select class="browser-default custom-select input_section selet validate_this" id="part_id"
                    name="part_id">
                    <option value="" selected>Select ward no first</option>
                </select>
            </div>
            <div class="form-row mb-2" data-validate="Enter break point">
                <label for="part_id" class="labelinput">Break point(seprate by ,)</label>
                <input type="text" class="input_section form-control" placeholder="ex. 120,150,226" name="breakPoints"
                    id="breakPoint">
            </div>
            <div class="">
                <div class="form-group files color">
                    <label> </label>
                    <input type="file" class="w-100" multiple="true" name="image[]" id="documents">
                </div>

            </div>

        </div>

        <div class="container row">
            <!-- Progress bar -->
            <div class="col-sm-3">
                <button type="submit" class="btn btn-danger waves-effect waves-light" id="submit_btn"
                    data-name="Document">Upload
                </button>
            </div>


            <div class="col-sm-6 progressContainerDocument d-none">
                <div class="progress mt-1">
                    <div class="progress-bar-document"></div>
                </div>
            </div>
            <div class="col-sm-3 progressContainerDocument d-none">
                <!-- Display upload status -->
                <div id="uploadStatusDocument">

                </div>
            </div>
        </div>
    </div>
</form>
<script>
    @if ($errors->any() || session()->has('error'))
    $(document).ready(function(){
        getCity($('#state'),'{{route('getCity')}}','city','{{old('city')}}');
        setTimeout(() => {
            getNN($(`#nnn_id`),'{{route('getNN')}}','nn_id','nnn_id','city','{{old('nn_id')}}');
        }, 1000);
        setTimeout(() => {
            getWard($(`#nn_id`),'{{route('getWard')}}','ward_id','{{old('ward_id')}}');
        }, 3000);
    });
    @endif



      $("#uploadDocumentForm").on('submit', function (e) {
                e.preventDefault();
                var documents = document.getElementById("documents");
                if (documents.files.length > 0) {
                    $(`.progressContainerDocument`).removeClass('d-none');
                    $.ajax({
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100).toFixed();
                                    $(".progress-bar-document").addClass('inProgress');
                                    $(".progress-bar-document").width(percentComplete + '%');
                                    $(".progress-bar-document").html(percentComplete + '%');
                                }
                                if(percentComplete == 100){
                                    $('#uploadStatusDocument').html(`<span class="text-info"><i class="fas fa-spinner fa-pulse mr-1"></i> Cropping images...</span>`);
                                }
                            }, false);
                            return xhr;
                        },
                        type: 'POST',
                        url: '{{route('admin.image.upload')}}',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $(".progress-bar-document").width('0%');
                            $('#uploadStatusDocument').html(`<span class="text-info"><i class="fas fa-spinner fa-pulse mr-1"></i> Uploading...</span>`);
                            $(`#submit_btn`).attr('disabled',true);
                        },
                        error: function () {
                            $(`#submit_btn`).attr('disabled',false);
                            $('#uploadStatusDocument').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
                        },
                        success: function (response) {
                            $(`#submit_btn`).attr('disabled',false);
                            if (response.success === true) {
                                if ($(`.documentsCount`).length === 0) {
                                    $(`.kycDocuments`).html('');
                                }
                                $(".progress-bar-document").removeClass('inProgress');
                                $(".progress-bar-document").addClass('onCompleted');
                                $('#uploadDocumentForm')[0].reset();
                                // console.log(response.documentsUploaded);
                                $('#uploadStatusDocument').html(`<span class="text-success"><i class="fas fa-check mr-1"></i> Uploaded</span>`);

                            } else if (response.success === false) {
                                $(".progress-bar-document").removeClass('inProgress');
                                $(".progress-bar-document").addClass('onError');
                                $('#uploadStatusDocument').html(`<span class="text-danger"><i class="fas fa-times mr-1"></i> ${response.exception}</span>`);
                            }
                        }
                    });
                }

            });
</script>
@stop
