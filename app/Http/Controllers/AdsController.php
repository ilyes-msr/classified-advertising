<?php

namespace App\Http\Controllers;

use App\Repositories\Ads\AdInterface;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    protected $ads;

    public function __construct(AdInterface $ad)
    {
        $this->ads = $ad;
    }

    public function all()
    {
        $ads = $this->ads->all();
    }

    public function create()
    {
        // dd(storage_path('app/public/images/thumbs'));
        return view('ads.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->ads->store($request);
        return back()->with('success', 'تم انشاء الإعلان');
    }
}
