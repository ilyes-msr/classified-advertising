@extends('layouts.web_layout')

@section('content')
<div class="col-lg-8">
  <h2>أدخل تفاصيل إعلانك</h2>

  @include('alerts.success')
  
  <form method="POST" action="{{route('ads.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="country_id" class="form-label">حدّد البلد</label>
      <select name="country_id" id="country_id" class="form-control">
        @include('lists.countries')
      </select>
    </div>

    <div class="mb-3">
      <label for="category_id" class="form-label">اختر التصنيف</label>
      <select name="category_id" id="category_id" class="form-control">
        @include('lists.categories')
      </select>
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">عنوان الإعلان</label>
      <input type="text" class="form-control" name="title" value="{{old('title')}}">
    </div>

    <div class="mb-3">
      <label for="details" class="form-label">تفاصيل الإعلان</label>
      <textarea name="description" id="details" class="form-control" rows="3">{{old('description')}}</textarea>
    </div>

    <div class="mb-3">
      <label for="price" class="form-label col-lg-3">السعر</label>
      <div class="row">
        <div class="col-lg-7">
          <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}" step="any" placeholder="أدخل السعر">
        </div>
        <div class="col-lg-5">
          <select name="currency_id" id="currency_id" class="form-control">
            <option value="" selected>اختر العملة</option>
            @include('lists.currencies')
          </select>
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label for="images" class="form-label"> أضف الصور </label>
      <input type="file" name="images[]"  class="form-control" multiple>
  </div>
  <button type="submit" class="btn btn-primary">أضف الإعلان</button>
  </form>
</div>
@endsection