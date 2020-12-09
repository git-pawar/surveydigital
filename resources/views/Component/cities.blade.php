@if(count($cities))
@foreach ($cities as $item)
<option value="{{$item->id}}" @if (isset($oldCity)) @if ($oldCity==$item->id)
    selected
    @endif
    @endif>{{$item->city_name}}</option>
@endforeach
@endif
