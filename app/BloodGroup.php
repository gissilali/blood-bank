<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $fillable = ['blood_group'];

    public $timestamps = false;

    public function donors(){

    	return $this->hasMany('App\Donor');

    }

    public function stock(){

    	return $this->belongsTo('App\Stock');

    }
}
