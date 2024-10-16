<?php

namespace App\View\Composers;

use App\Models\Currency;
use Illuminate\View\View;

class CurrenciesComposer
{
  protected $currencies;

  public function __construct()
  {
    $this->currencies = Currency::all();
  }

  public function compose(View $view): void
  {
    $view->with('currencies', $this->currencies);
  }
}
