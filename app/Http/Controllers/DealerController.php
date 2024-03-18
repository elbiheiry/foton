<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dealer;
use App\Models\City;
use App\Models\State;
use stdClass;
use App\Models\PageSetting;

class DealerController extends Controller
{
    public function index()
    {
        $dealers = Dealer::where('active', true)->get();
        $cities = city::whereIn('id', $dealers->pluck('city_id'))->pluck('state_id');
        $governorates = State::whereIn('id', $cities)->get();

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'dealers')->first();

        return view('dealers', compact('dealers', 'governorates', 'pageSetting'));
    }

    public function load_cities(Request $request)
    {
        $cities = city::where('state_id', $request->id)->get();
        $dealers = Dealer::whereIn('city_id', $cities->pluck('id'))->get();

        $resp = new stdClass;
        $resp->cities = view('partials.dealers.cities', compact('cities'))->render();
        $resp->dealers = view('partials.dealers.dealer', compact('dealers'))->render();
        return response()->json($resp, 200);
    }

    public function load_dealers(Request $request)
    {
        $dealers = Dealer::where('city_id', $request->id)->get();

        $resp = new stdClass;
        $resp->dealers = view('partials.dealers.dealer', compact('dealers'))->render();
        return response()->json($resp, 200);
    }
}
