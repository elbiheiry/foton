<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\PageSetting;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('active', true)->paginate(12);

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'news')->first();

        return view('blogs',compact('blogs', 'pageSetting'));
    }

    public function show($blog)
    {
        $id = preg_split("/\D+/", $blog)[0];

        $blog = Blog::where('active',true)->findOrFail($id);

        if(!$blog->localized){
            abort('404');
        }

        $seo_description = $blog->localized->seo_description;

        return view('blog',compact('blog', 'seo_description'));
    }
}
