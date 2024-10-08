<form class="row g-3">
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
    <select class="form-select" aria-label="Default select example">
      <option selected>اختر التصنيف</option>
      @include('lists.categories')
    </select>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
    <select class="form-select" aria-label="Default select example">
      <option selected>اختر الدولة</option>
      @include('lists.countries')
    </select>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
    <label for="inputPassword2" class="visually-hidden">عنوان الإعلان</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="عنوان الإعلان">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
    <button type="submit" class="btn btn-primary mb-3">{{__('بحث')}}</button>
  </div>
</form>