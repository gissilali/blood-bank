<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BloodGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Request as BloodRequest;

class RequestController extends Controller
{
    public function showRequestForm(){

    	$blood_groups = BloodGroup::all();
    	$user = Auth::user();
    	return view('request_form', compact('user','blood_groups'));	
    }

    public function registerRequest(Request $request){

    	// dd($request->all());

		$validator = Validator::make($request->all(), [

			'blood_group' => 'required',
			'blood_quantity' => 'required|integer',

			]);
		if($validator->fails()){

			return back()->withErrors($validator)->withInput();
			
		}
		else{

			Auth::user()->requests()->create([
					'blood_group_id' => $request['blood_group'],
					'quantity' => $request['blood_quantity']
				]);
			return redirect('home');
		}
    	
    }

    public function approveRequest($request_id){

    	// $user = User::find($user_id);
    	$request = BloodRequest::find($request_id);
    	$request->approved = true;
    	$request->update();

    	return back();

    }

}
