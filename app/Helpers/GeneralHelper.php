<?php

// app/Helpers/GeneralHelper.php
namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class GeneralHelper
{

  public static function createUniqueSlug(string $title, Model $model, string $column = 'slug'): string
  {
    // Initial slug generation
    $slug = self::createSlug($title);
    $originalSlug = $slug;

    // Check if the slug already exists in the database
    $count = 1;
    while ($model::where($column, $slug)->exists()) {
      // If the slug exists, append a number to make it unique
      $slug = $originalSlug . '-' . $count;
      $count++;
    }

    return $slug;
  }

  public static function createSlug(string $title): string
  {
    // Convert title to lowercase
    $slug = mb_strtolower(trim($title), 'UTF-8');

    // Replace spaces with dashes
    $slug = preg_replace('/\s+/u', '-', $slug);

    // Allow Arabic characters and alphanumeric, but replace other characters with dashes
    $slug = preg_replace('/[^\p{Arabic}a-z0-9-]+/u', '-', $slug);

    // Replace multiple dashes with a single dash
    $slug = preg_replace('/-+/', '-', $slug);

    // Remove leading and trailing dashes
    $slug = trim($slug, '-');

    return $slug;
  }
}
