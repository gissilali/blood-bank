<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BloodGroup;
use App\Donor;

class BloodController extends Controller
{
	public function showBloodGroupList(){

		$blood_groups = BloodGroup::orderBy('name','desc')->get();
		return view('blood_group_list', compact('blood_groups'));
	}

	public function showDonorList($blood_group_id){

		$donors = Donor::where('blood_group_id', $blood_group_id)->orderBy('name', 'desc')->get();

		return view('donor_list', compact('donors'));

	}

	public function showDonor($donor_id){

		$donor = Donor::find($donor_id);
		return view('view_donor', compact('donor'));
	}

	public function makeDonation(Request $request){

	}

	public function updateDonor(Request $request){

	}

}
