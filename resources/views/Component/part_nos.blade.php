<option selected>Select</option>
@if(count($part_nos))
@foreach ($part_nos as $item)
<option value="{{$item->id}}" @if (isset($oldId)) @if ($oldId==$item->id)
    selected
    @endif
    @endif>{{str_pad($item->part_no,2,0,STR_PAD_LEFT)}}</option>
@endforeach
@endif
