<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerMail;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('active', true)->get();

        return view('careers', compact('careers'));
    }

    public function application(Request $request)
    {
        $inputs = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'resume' => $request->file('resume'),
        ];
        $rules = [
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits_between:7,15',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ];
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            $resp = new stdClass;
            $resp->status = false;
            $resp->message = $validator->errors()->all();
            return response()->json($resp, 200);
        }
        $file = $request->file('resume');
        $path = 'uploads/files/cv/';
        $name = time().'-'.$file->getClientOriginalName();
        $file->move($path, $name);

        $application = new Application;
        $application->first_name = $request->first_name;
        $application->last_name = $request->last_name;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->notes = $request->notes;
        $application->resume = 'files/cv/'.$name;
        $application->save();

        $settings = \Setting::orderBy('id','desc')->first();

        if($application && $settings && $settings->career_mail){
            Mail::to($settings->career_mail)->send(new CareerMail($application));
        }

        $resp = new stdClass;
        $resp->status = true;
        $resp->message = __('admin.Your Application has been sent successfully');
        return response()->json($resp, 200);
    }
}
