<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AfterSale;
use App\Models\Maintenance;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\SparePart;
use stdClass;
use App\Models\PageSetting;

class AfterSaleController extends Controller
{
    public function index()
    {
        $serviceCenters = AfterSale::where('active', true)->get();
        $vehicles = Vehicle::where('active', true)->get();
        $vehicleTypes = VehicleType::where('active', true)->get();

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'afterSale')->first();

        return view('afterSale', compact('serviceCenters', 'vehicles', 'vehicleTypes', 'pageSetting'));
    }

    public function load_part_name(Request $request)
    {
        $spareParts = SparePart::where('active', true)->where('vehicleType_id', $request->id)->get();

        $resp = new stdClass;
        $resp->list = view('partials.afterSale.loadPartName', compact('spareParts'))->render();
        $resp->parts = view('partials.afterSale.loadParts', compact('spareParts'))->render();
        return response()->json($resp, 200);
    }

    public function load_parts(Request $request)
    {
        $spareParts = SparePart::where('active', true)->where('id', $request->id)->get();

        $resp = new stdClass;
        $resp->parts = view('partials.afterSale.loadParts', compact('spareParts'))->render();
        return response()->json($resp, 200);
    }
    public function load_maintenance(Request $request)
    {
        $main = Vehicle::where('id', $request->id)->first();
        $resp = view('partials.afterSale.loadMaintenance', compact('main'))->render();

        return response()->json($resp, 200); 
    }
}
