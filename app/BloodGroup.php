<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $fillable = ['blood_group'];

    public function donors(){

    	return $this->hasMany('App\Donor');

    }
}
