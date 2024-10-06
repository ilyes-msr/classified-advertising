<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Laravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">      
        @auth
          <a class="nav-link" href="{{ url('/dashboard') }}">{{ __('لوحة التحكم') }}</a>
        @else
        <a class="nav-link" href="{{ route('login') }}">{{ __('دخول') }}</a>
            @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('تسجيل') }}</a>
            @endif
        @endauth
      </ul>
    </div>
  </div>
</nav>