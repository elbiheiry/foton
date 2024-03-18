<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\PageSetting;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('active',true)->paginate(9);

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'services')->first();

        return view('services',compact('services' ,'pageSetting'));
    }
}
