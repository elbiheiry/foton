<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagesGallary;
use App\Models\VideoGallary;
use App\Models\PageSetting;

class GallaryController extends Controller
{
    public function images()
    {
        $imagesGallaries = ImagesGallary::where('active', true)->paginate(8);

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'imageGallary')->first();

        return view('imagesGallary',compact('imagesGallaries', 'pageSetting'));
    }

    public function videos()
    {
        $videosGallaries = VideoGallary::where('active', true)->paginate(8);

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'videoGallary')->first();

        return view('videosGallary',compact('videosGallaries', 'pageSetting'));
    }

    public function image_show($gallary)
    {
        $id = preg_split("/\D+/", $gallary)[0];

        $ImagesGallary = ImagesGallary::where('active',true)->findOrFail($id);

        if(!$ImagesGallary->localized){
            abort('404');
        }

        $seo_description = $ImagesGallary->localized->seo_description;

        return view('imagesGallaryDetails',compact('ImagesGallary', 'seo_description'));
    }
}
