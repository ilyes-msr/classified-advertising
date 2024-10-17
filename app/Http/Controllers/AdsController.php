<?php

namespace App\Http\Controllers;

use App\Repositories\Ads\AdInterface;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Image;

class AdsController extends Controller
{
    protected $ads;

    public function __construct(AdInterface $ad)
    {
        $this->ads = $ad;
    }

    public function create()
    {
        // dd(storage_path('app/public/images/thumbs'));
        return view('ads.create');
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        // dd(storage_path('app/public/images/thumbs'));
        $countries = Country::all();
        $currencies = Currency::all();
        $categories = Category::all();
        $images = Image::where('ad_id', $id)->get();
        return view('ads.edit', compact('ad', 'countries', 'currencies', 'categories', 'images'));
    }

    public function store(Request $request)
    {

        $this->ads->store($request);
        return back()->with('success', 'تم انشاء الإعلان');
    }

    public function update(Request $request, $id)
    {
        $this->ads->update($request, $id);

        return redirect(route('ads.myads'))->with('success', 'تم تحديث الإعلان');
    }

    public function myAds()
    {
        $ads = $this->ads->getByUser();
        return view('ads.myads', compact('ads'));
    }
}
