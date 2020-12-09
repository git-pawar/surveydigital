<option selected>Select</option>
@if(count($sections))
@foreach ($sections as $item)
<option value="{{$item->id}}" @if (isset($oldId)) @if ($oldId==$item->id)
    selected
    @endif
    @endif>{{$item->section_name}} ({{$item->section_no}})</option>
@endforeach
@endif
