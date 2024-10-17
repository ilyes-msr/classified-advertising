<?php

namespace App\Repositories\Ads;

use App\Helpers\GeneralHelper;
use App\Models\Ad;
use App\Models\Image;
use App\Traits\ImageUploadTrait;

class AdRepository implements AdInterface
{
  use ImageUploadTrait;

  protected $ads;

  public function __construct(Ad $ads)
  {
    $this->ads = $ads;
  }

  public function store($request)
  {
    $slug = GeneralHelper::createUniqueSlug($request->input('title'), new Ad);

    $ad = $request->user()->ads()->create($request->all() + ['slug' => $slug]);

    if ($request->file('images')) {
      $this->storeImages($ad, $request->file('images'));
    }
  }

  public function update($request, $id)
  {


    $ad = Ad::findOrFail($id);

    $slug = GeneralHelper::createUniqueSlug($request->input('title'), new Ad);

    $ad->update($request->all() + ['slug' => $slug]);
  }

  public function storeImages($ad, $imgArray)
  {
    foreach ($imgArray as $img) {
      $image_name = $this->saveImages($img);
      $image = new Image();
      $image->image = $image_name;
      $ad->images()->save($image);
    }
  }

  public function getByUser()
  {
    return $this->ads->where('user_id', auth()->id())->get();
  }
}
