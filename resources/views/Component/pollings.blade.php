<option selected>Select</option>
@if(count($pollings))
@foreach ($pollings as $item)
<option value="{{$item->id}}" @if (isset($oldId)) @if ($oldId==$item->id)
    selected
    @endif
    @endif>{{$item->polling_name}} ({{$item->polling_no}})</option>
@endforeach
@endif
