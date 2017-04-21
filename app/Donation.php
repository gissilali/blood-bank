<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{

	protected $fillable = ['quantity'];
	
    public function donor(){

    	return $this->belongsTo('App\Donor');

    }
}
