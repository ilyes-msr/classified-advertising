@extends('layouts.web_layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <table class="table">
          <thead>
            <th>عنوان الإعلان</th>
            <th>تاريخ الإضافة</th>
            <th>إجراء</th>
          </thead>
          <tbody>
        @foreach($ads as $ad)
        <tr>
          <td>{{$ad->title}}</td>
          <td>{{$ad->created_at->diffForHumans()}}</td>
          <td>
            <a href="" class="btn btn-outline-secondary">تعديل</a>
            <form class="d-inline">
              @csrf
              <button class="btn btn-outline-danger">حذف</button>
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