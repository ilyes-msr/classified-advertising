@foreach($currencies as $currency)
  <option value="{{$currency->id}}">{{$currency->currency}}</option>
@endforeach