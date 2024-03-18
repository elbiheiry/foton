<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Models\Vehicle;
use App\Models\Offer;
use App\Models\Blog;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $homeSliders = HomeSlider::where('active',true)->get();
        $vehicles = Vehicle::where('active',true)->where('featured',true)->get();
        $offers = Offer::where('active',true)->where('featured',true)->get();
        $blogs = Blog::where('active',true)->where('featured',true)->get();
        $events = Event::where('active',true)->where('featured',true)->get();
        $homeHighlights = \Setting::orderBy('id','desc')->first()->homeHighlights;
        $homeSectionsDescription = \Setting::orderBy('id','desc')->first()->homeSectionDescriptions;
        $firstHighlight = $homeHighlights->where('order', '1')->first();
        $secondHighlight = $homeHighlights->where('order', '2')->first();
        $thirdHighlight = $homeHighlights->where('order', '3')->first();
        $forthHighlight = $homeHighlights->where('order', '4')->first();
        $fifthHighlight = $homeHighlights->where('order', '5')->first();
        return view('home', compact('homeSliders', 'vehicles', 'offers', 'blogs', 'events', 'firstHighlight', 'secondHighlight', 'thirdHighlight', 'forthHighlight', 'fifthHighlight', 'homeSectionsDescription'));
    }
}
