<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Models\VehicleModelTranslation;
use App\Models\VehicleTypeSlider;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicleTypes = VehicleType::where('active',true)->with('vehicles')->get();
        $vehicleTypeSliders = VehicleTypeSlider::where('active', true)->get();

        return view('vehicles',compact('vehicleTypes', 'vehicleTypeSliders'));
    }

    public function show($slug)
    {
        $id = preg_split("/\D+/", $slug)[0];
        $vehicle = Vehicle::findOrFail($id);
        if(!$vehicle->localized){
            abort('404');
        }

        $seo_description = $vehicle->localized->seo_description;

        return view('vehicle', compact('vehicle', 'seo_description'));
    }

    public function search(Request $request)
    {
        $searches = VehicleModelTranslation::where('title','like','%'.$request->q.'%')->with('vehicleModel')->get();

        return view('partials.search', compact('searches'));
    }
}
