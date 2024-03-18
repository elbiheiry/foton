<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class NewContactController extends Controller
{
    public function getIndex() {
        return view('new_contact');
    }
    
    public function postIndex(Request $request){
        $v = validator($request->all() , [
			'name' => 'required',
			'phone' => 'required',
			'model' => 'not_in:0',
			'city' => 'not_in:0'
		] ,[
			'name.required' => app()->getLocale() == 'en' ? 'Please enter your name' : 'برجاء ادخال الاسم بالكامل',
			'phone.required' => app()->getLocale() == 'en' ? 'Please enter your phone number' : 'برجاء ادخال رقم الهاتف',
			'model.not_in' => app()->getLocale() == 'en' ? 'Please select the model' : 'برجاء اختيار الموديل',
			'city.not_in' => app()->getLocale() == 'en' ? 'Please select the city' : 'برجاء اختيار المدينه'
		]);

		if ($v->fails()){
			return response()->json( $v->errors()->first(), 500);
		}

		$message = new Message();

		$message->city = $request->city;
		$message->name = $request->name;
		$message->phone = $request->phone;
		$message->model = $request->model;

		if ($message->save()){
		    return response()->json(app()->getLocale() == 'en' ? 'Thank you' : 'شكرا لك',200);
		}
    }
    
    public function getThanks() {
        return view('thanks');
    }
}
