<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\PageSetting;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('active', true)->paginate(12);

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'events')->first();

        return view('events',compact('events', 'pageSetting'));
    }

    public function show($event)
    {
        $id = preg_split("/\D+/", $event)[0];

        $event = Event::where('active',true)->findOrFail($id);

        if(!$event->localized){
            abort('404');
        }

        $seo_description = $event->localized->seo_description;

        return view('event',compact('event', 'seo_description'));
    }
}
