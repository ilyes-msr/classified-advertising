<?php

namespace App\View\Composers;

use App\Models\Country;
use Illuminate\View\View;

class CountryComposer
{
  protected $countries;

  public function __construct()
  {
    $this->countries = Country::all();
  }

  public function compose(View $view): void
  {
    $view->with('countries', $this->countries);
  }
}
