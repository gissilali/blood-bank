<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BloodController extends Controller
{
	public function showDonationForm(){
		return view('donation_form');
	}

	public function makeDonation(Request $request){
		$messages = [

		'digits_between:65,1000' => 'Weight should be at least 65 KG',
		
		];
		$validator = Validator::make($request->all(), [

			'name' => 'required',
			'blood_group' => 'required',
			'email' => 'required|email',
			'weight' => 'required|integer|digits_between:65,1000',
			'age' => 'integer|required|digits_between:16,1000'

			], $messages);
		if($validator->fails()){
			return back()->withErrors($validator);
		}
		else{




		}
		
	}
}
