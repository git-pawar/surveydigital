@extends('master')
@section('title','Send SMS')
@section('content')
<style>
    .width-100 {
        width: 100%;
    }
</style>
<div class="maininnersection px-2 position-relative">
    <div class="row mx-0 mb-2">
        <div class="width-40">
            <label for="ward_no" class="labelinput">Ward No -<span
                    class="mx-1">{{$user->wards->ward_no??''}}</span></label>
        </div>
        <div class="width-30 mx-2">
            <select class="form-control selectinput mb-1" name="part_id" id="part_id">
                <option value="">Select Part No </option>
                @if (count($parts))
                @foreach ($parts as $item)
                <option value="{{$item->id}}" @if (isset($part_id)) @if ($part_id==$item->id) selected @endif
                    @endif>{{$item->part_no}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div id="refreshList">
        <textarea class="width-100 form-row" rows="5" placeholder="Type sms here..." name="textMessage"
            id="textMessage"></textarea>
    </div>
    <div class="submitbtn">
        <button class="submitbutton btn btnblue btn-block" onclick="sendSms(this);" data-id="surveyData" type="button">
            <i class="fas fa-save mr-1"></i> Send
        </button>
    </div>
    </form>
</div>
<script>
    function sendSms(dis){
        const part_id = $(`#part_id`).val();
        const textMessage = $(`#textMessage`).val();
        let validate = true;
        let thisHtml = $(dis).html();

            if(!part_id){
                validate = false;
                $(`#part_id`).css('border','1px solid red');
            }else{
                $(`#part_id`).css('border','1px solid #ccc');
            }
            if(!textMessage){
                validate = false;
                $(`#textMessage`).css('border','1px solid red');
            }else{
                $(`#textMessage`).css('border','1px solid #ccc');
            }
      if(validate){
        $.ajax({
            url: '{{route('sendsms.process')}}',
            type: 'get',
            data: { part_id, textMessage },
            beforeSend: function() {
                Notiflix.Loading.Circle();
                $(dis).html(`<i class="fas fa-spinner fa-pulse"></i>`);
                $(dis).attr('disabled', true);
                Notiflix.Notify.Success(response.message);
            },
            success: function(response) {
                Notiflix.Loading.Remove();
                $(dis).html(thisHtml);
                if (response.success === true) {
                    $(`#part_id`).val('');
                    $(`#textMessage`).val('');
                    $(dis).attr('disabled',false);
                } else {
                    $(dis).attr('disabled',false);
                    Notiflix.Notify.Failure(response.message);
                }
            },
            error: function(xhr) {
                $(dis).attr('disabled',false);
                Notiflix.Loading.Remove();
                Notiflix.Report.Failure('Server error', `Code: ${xhr.status}, Exception: ${xhr.statusText}`, 'OK');
            }
        });
    }
}
</script>
@stop
