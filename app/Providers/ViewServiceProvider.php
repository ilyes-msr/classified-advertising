<?php

namespace App\Providers;

use App\View\Composers\CategoriesComposer;
use App\View\Composers\CountryComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{

  public function register(): void
  {
    $this->app->singleton(CategoriesComposer::class);
    $this->app->singleton(CountryComposer::class);
  }

  public function boot(): void
  {
    Facades\View::composer(['partials.categoryNav', 'partials.searchfrm', 'lists.categories'], CategoriesComposer::class);
    Facades\View::composer(['partials.searchfrm', 'lists.countries'], CountryComposer::class);
  }
}
