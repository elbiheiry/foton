<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\State;
use App\Models\TestDrive;
use Illuminate\Support\Facades\Validator;
use stdClass;
use App\Models\PageSetting;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestDriveMail;

class TestDriveController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::where('active',true)->get();
        $states = State::with('country')->get();

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'testDrive')->first();

        return view('testDrive', compact('vehicles', 'states', 'pageSetting'));
    }

    public function onTestDrive(Request $request)
    {
        $inputs = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        $rules = [
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits_between:7,15',
        ];
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            $resp = new stdClass;
            $resp->status = false;
            $resp->message = $validator->errors()->all();
            return response()->json($resp, 200);
        }

        $testDrive = TestDrive::create($request->all());

        $settings = \Setting::orderBy('id','desc')->first();
        $vehicles = Vehicle::where('id',$request->vehicle_id)->first();
        $states = State::where('id',$request->state_id)->with('country')->first();

        $testDrive->state_id = $states->localized;
        $testDrive->vehicle_id = $vehicles->localized->title;
        if($testDrive && $settings && $settings->drive_mail){
            Mail::to($settings->drive_mail)->send(new TestDriveMail($testDrive));
        }

        $resp = new stdClass;
        $resp->status = true;
        $resp->message = __('admin.Thank you for contacting us!');
        return response()->json($resp, 200);
    }
}
