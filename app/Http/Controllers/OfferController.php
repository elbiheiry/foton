<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\PageSetting;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::where('active',true)->paginate(9);

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'offers')->first();

        return view('offers',compact('offers', 'pageSetting'));
    }

    public function show($offer)
    {
        $id = preg_split("/\D+/", $offer)[0];

        $offer = Offer::where('active',true)->findOrFail($id);

        if(!$offer->localized){
            abort('404');
        }

        $seo_description = $offer->localized->seo_description;

        $moreOffers = Offer::where('active',true)->where('id','!=',$offer->id)->orderBy('created_at', 'desc')->limit(3)->get();

        return view('offer',compact('offer', 'moreOffers', 'seo_description'));
    }
}
