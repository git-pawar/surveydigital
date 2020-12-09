<option selected>Select</option>
@if(count($nn))
@foreach ($nn as $item)
<option value="{{$item->id}}" @if (isset($oldId)) @if ($oldId==$item->id)
    selected
    @endif
    @endif>{{$item->name}}</option>
@endforeach
@endif
