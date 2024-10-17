@extends('layouts.web_layout')

@section('content')
<div class="col-lg-8">
  <h2>تعديل بيانات الإعلان</h2>

  @include('alerts.success')
  
  <form method="POST" action="{{route('ads.update', $ad->id)}}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="country_id" class="form-label">حدّد البلد</label>
      <select name="country_id" id="country_id" class="form-control">
        @foreach($countries as $country)
          <option value="{{$country->id}}" {{$country->id == $ad->country_id ? 'selected' : ''}}>{{$country->country}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="category_id" class="form-label">اختر التصنيف</label>
      <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $category)
          <option value="{{$category->id}}" {{$category->id == $ad->category_id ? 'selected' : ''}}>{{$category->category}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">عنوان الإعلان</label>
      <input type="text" class="form-control" name="title" value="{{$ad->title}}">
    </div>

    <div class="mb-3">
      <label for="details" class="form-label">تفاصيل الإعلان</label>
      <textarea name="description" id="details" class="form-control" rows="3">{{$ad->description}}</textarea>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label col-lg-3">السعر</label>
      <div class="row">
        <div class="col-lg-7">
          <input type="number" name="price" id="price" class="form-control" value="{{$ad->price}}" step="any" placeholder="أدخل السعر">
        </div>
        <div class="col-lg-5">
          <select name="currency_id" id="currency_id" class="form-control">
            <option value="" selected>اختر العملة</option>
            @foreach($currencies as $currency)
              <option value="{{$currency->id}}" {{ $currency->id == $ad->currency_id ? 'selected' : '' }}>{{$currency->currency}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    
    <div class="mb-3">
      <label class="form-label d-block">صور الإعلان</label>
      @foreach ($images as $image)
          <img src="{{asset('storage/images/thumbs/' . $image->image)}}" alt="">
      @endforeach
    </div>

  <button type="submit" class="btn btn-primary">تعديل الإعلان</button>
  </form>
</div>
@endsection