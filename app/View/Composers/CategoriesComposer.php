<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
  protected $categories;

  public function __construct()
  {
    $this->categories = Category::all();
  }

  public function compose(View $view): void
  {
    $view->with('categories', $this->categories);
  }
}
