<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BloodGroup;

class StockController extends Controller
{
    public function showStock(){

    	$blood_groups = BloodGroup::all();
    	return view('stock', compact('blood_groups'));

    }

    public function filterStock(){

    }
}
