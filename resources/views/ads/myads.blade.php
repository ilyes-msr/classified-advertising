@extends('layouts.web_layout')

@section('content')
<div class="">
  @include('alerts.success')

  <h2 class="my-3">إعلاناتي</h2>
</div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <table class="table">
          <thead>
            <th>عنوان الإعلان</th>
            <th>تاريخ الإضافة</th>
            <th>السعر</th>
            <th>إجراء</th>
          </thead>
          <tbody>
        @foreach($ads as $ad)
        <tr>
          <td>{{$ad->title}}</td>
          <td>{{$ad->created_at->diffForHumans()}}</td>
          <td>{{$ad->price}}</td>
          <td>
            <a href="{{route('ads.edit', $ad->id)}}" class="btn btn-outline-secondary btn-sm">تعديل</a>
            <form class="d-inline" action="{{route('ads.destroy', $ad->id)}}">
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger btn-sm">حذف</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      </table>
      </div>
    </div>
  </div>
@endsection