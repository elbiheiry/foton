<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\PageSetting;

class AboutController extends Controller
{
    public function amg()
    {
        $about = About::where('slug', 'amg')->firstOrFail();

        if(!$about->localized){
            abort('404');
        }

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'aboutAmg')->first();

        return view('about', compact('about', 'pageSetting'));
    }

    public function foton()
    {
        $about = About::where('slug', 'foton')->firstOrFail();

        if(!$about->localized){
            abort('404');
        }

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'aboutFoton')->first();

        return view('about', compact('about', 'pageSetting'));
    }
    
    public function tvd()
    {
        $about = About::where('slug', 'tvd')->firstOrFail();

        if(!$about->localized){
            abort('404');
        }

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'aboutTvd')->first();

        return view('about', compact('about', 'pageSetting'));
    }
}
