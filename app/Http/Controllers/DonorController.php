<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BloodGroup;
use App\Donor;

class DonorController extends Controller
{
	public function showRegisterDonorForm(){
		
		$blood_groups = BloodGroup::orderBy('name','desc')->get();
		return view('donation_form', compact('blood_groups'));
	}

	public function registerDonor(Request $request){

		$validator = Validator::make($request->all(), [

			'name' => 'required',
			'blood_group' => 'required',
			'email' => 'required|email',
			'weight' => 'required|integer|required_weight',
			'age' => 'required|integer|required_age',
			'gender' => 'required'

			]);
		if($validator->fails()){

			return back()->withErrors($validator)->withInput();
			
		}
		else{

			$donor_exists = Donor::where('email',$request['email'])->get();
			// dd($donor_exists);

			if(count($donor_exists)>0){

				$request->session()->flash('donor_exists', 'Donor with email '.$request['email'].' exits');
				return back()->withInput();

			}
			else{

				$donor_id = Donor::create([

					'name' => $request['name'],
					'blood_group_id' => $request['blood_group'],
					'email' => $request['email'],
					'weight' => $request['weight'],
					'age' => $request['age'],
					'gender' => $request['gender']

				])->id;

				$request->session()->flash('donor_added', 'Donor added succesfully Donor Id: '.$donor_id);
				return redirect('/donation');
			}
			
		}
		
	}

	public function updateDonor(Request $request){

	}

}
