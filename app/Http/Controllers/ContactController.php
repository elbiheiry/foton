<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Validator;
use stdClass;
use App\Models\PageSetting;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        $settings = \Setting::orderBy('id','desc')->first();

        $pageSetting = PageSetting::orderBy('created_at', 'desc')->where('page', 'contact')->first();
        return view('contact', compact('settings', 'pageSetting'));
    }

    public function onContact(Request $request)
    {
        $inputs = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'call_time' => $request->call_time,
        ];
        $rules = [
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'email' => 'nullable|email|max:191',
            'mobile' => 'required|digits_between:7,15',
            'message' => 'required|max:255',
            'call_time' => 'required',
        ];
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            $resp = new stdClass;
            $resp->status = false;
            $resp->message = $validator->errors()->all();
            return response()->json($resp, 200);
        }

        $contact = ContactUs::create($request->all());

        $settings = \Setting::orderBy('id','desc')->first();

        if($contact && $settings && $settings->contact_mail){
            Mail::to($settings->contact_mail)->send(new ContactMail($contact));
        }

        if($contact && $settings && $settings->contact_drive_to_email && $request->drive_to){
            Mail::to($settings->contact_drive_to_email)->send(new ContactMail($contact));
        }

        $resp = new stdClass;
        $resp->status = true;
        $resp->message = __('admin.Thank you for contacting us!');
        return response()->json($resp, 200);
    }
}
