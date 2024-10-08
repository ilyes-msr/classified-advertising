@foreach($countries as $country)
  <option value="{{$country->id}}">{{$country->country}}</option>
@endforeach