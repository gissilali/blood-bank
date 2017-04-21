<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BloodGroup;
use App\Donor;
use App\Stock;
use App\Request as BloodRequest;

class BloodController extends Controller
{

	public function getDonorQuantity($donor_id){
		$quantity = 0;
		$donor = Donor::find($donor_id);
		$donations = $donor->donations()->get();
		foreach ($donations as $donation) {
			$quantity+=$donation->quantity;
		}

		return $quantity;
	}

	public function showBloodGroupList(){

		$blood_groups = BloodGroup::orderBy('name','desc')->get();
		return view('blood_group_list', compact('blood_groups'));
	}

	public function showDonorList($blood_group_id){

		$donors = Donor::where('blood_group_id', $blood_group_id)->orderBy('name', 'desc')->paginate(20);

		return view('donor_list', compact('donors'));
	}

	public function showDonor($donor_id){
		
		$donation_quantity = $this->getDonorQuantity($donor_id);
		$donor = Donor::find($donor_id);
		return view('view_donor', compact('donor', 'donation_quantity'));
	}

	public function registerDonation(Request $request,$donor_id){

		$validator = Validator::make($request->all(),[
				'blood_quantity' => 'required|integer'
			]);
		if($validator->fails()){
			return back()->withErrors($validator)->withInput();
		}
		$donor = Donor::find($donor_id);
		$donor->donations()->create([
				'quantity' => $request['blood_quantity']
			]);
		/**
		 * Update Stock
		 */
		$blood_group = BloodGroup::find($donor->blood_group_id);
		$blood_group->quantity += $request['blood_quantity'];
		$blood_group->donated += $request['blood_quantity'];
		$blood_group->update();
		// dd($request['blood_quantity']);
		return redirect('view-donors');
	}

	public function updateDonor(Request $request){

	}

	public function showRequestForm(){
	}

	public function showRequests(){

		$blood_groups = BloodGroup::all();
		$requests = BloodRequest::orderBy('created_at', 'asc')->with('user')->paginate(8);

		return view('request_list', compact('blood_groups', 'requests'));
		
	}

}
