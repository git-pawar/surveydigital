<option selected>Select</option>
@if(count($ward))
@foreach ($ward as $item)
<option value="{{$item->id}}" @if (isset($oldId)) @if ($oldId==$item->id)
    selected
    @endif
    @endif>{{$item->ward_name}} ({{$item->ward_no}})</option>
@endforeach
@endif
